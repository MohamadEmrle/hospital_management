<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'photo',
        'start_date',
        'end_date',
        'status',
    ];
}
