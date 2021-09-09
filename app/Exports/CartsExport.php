<?php

namespace App\Exports;

use App\Enums\CartStatus;
use App\Models\Cart;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartsExport implements FromQuery,WithHeadings,ShouldQueue
{
    use Exportable;

    public function headings(): array
    {
        return [
            'id',
            'user id',
            'total price',
            'status',
            'first name',
            'last name',
            'name of card',
            'credit card number',
            'lang',
            'created at',
            'updated at',
        ];
    }

    public function query()
    {
        return Cart::query()->where('status',CartStatus::DONE);
    }
}
