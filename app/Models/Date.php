<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Detection;
use Illuminate\Database\Eloquent\SoftDeletes;

class Date extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'for_hour',
        'to_hour',
        'day',
        'doctor_id',
    ];
    public function doctors()
    {
        return $this->belongsTo(related:Doctor::class,foreignKey:'doctor_id');
    }
    public function detection(){
        return $this->hasMany(related:Detection::class,foreignKey:'date_id',localKey:'id');
    }
}
