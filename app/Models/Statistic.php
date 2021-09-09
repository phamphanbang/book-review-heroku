<?php

namespace App\Models;

use App\Enums\CartStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Tags\Tag;

class Statistic extends Model
{
    use HasFactory;

    public function CartStatisticDay($types){
        $data["labels"] = collect([]);
        $data["done"] = collect([]);
        $data["pending"] = collect([]);
        $data["cancel"] = collect([]);
        $days = $this->calcDay($types);
        for($days_backwards = $days;$days_backwards >= 0; $days_backwards--) {
            $when = $this->calcWhen($types,$days_backwards);
            $data["labels"]->push($when);
            $data["done"]->push(Cart::whereDate('created_at', $when)->where('status',CartStatus::DONE)->count());
            $data["pending"]->push(Cart::whereDate('created_at', $when)->where('status',CartStatus::PENDING)->count());
            $data["cancel"]->push(Cart::whereDate('created_at', $when)->where('status',CartStatus::CANCEL)->count());
        }
        return $data;
    }

    public function RevenueDay($types){
        $data["labels"] = collect([]);
        $data["revenue"] = collect([]);
        $days = $this->calcDay($types);
        for($days_backwards = $days;$days_backwards >= 0; $days_backwards--) {
            $when = $this->calcWhen($types,$days_backwards);
            $result = DB::table('cart')->select(DB::raw('SUM(total_price) as revenue'))->whereDate('created_at', $when)->where('status',CartStatus::DONE)->pluck('revenue');
            $data["labels"]->push($when);
            $data["revenue"]->push($result[0]?$result[0]:0);
        }
        return $data;
    }

    public function TagStatistic($types){
        $data["labels"] = collect([]);
        $data["count"] = collect([]);
        $days = $this->calcDay($types);
        $tags = Tag::orderBy('count','desc')->limit(20)->get();
        foreach ($tags as $tag) {
            $data["labels"]->push($tag->name);
            $data["count"]->push($tag->count);
        }
        return $data;
    }

    private function calcDay($types) {
        if ($types == "week") {
            $days = 7;
        }
        if ($types == "month") {
            $month_begin = Carbon::now()->startOfMonth();
            $month_end = Carbon::now()->endOfMonth();
            $days = $month_begin->diffInDays($month_end);
        }
        return $days;
    }

    private function calcWhen($types,$days_backwards) {
        if ($types == "week") {
            $when = Carbon::now()->endOfWeek()->subDays($days_backwards)->format('Y-m-d');
        }
        if ($types == "month") {
            $when = Carbon::now()->endOfMonth()->subDays($days_backwards)->format('Y-m-d');
        }
        return $when;
    }
}
