<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;
    protected $table = "activity_type";

    public function activity() {
        return $this->hasMany(Activity::class,'type_id');
    }
}
