<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detection;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pricess';
    protected $fillable = [
        'Profits_Dr',
        'Profits_center',
        'total_value',
        'doctor_id',
    ];
    public function detection(){
        return $this->hasMany(related:Detection::class,foreignKey:'price_id');
    }
    public function doctors(){
        return $this->belongsTo(related:Doctor::class,foreignKey:'doctor_id');
    }
}
