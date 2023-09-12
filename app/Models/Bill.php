<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'discount',
        'total_value',
        'payment',
        'user_id',
        'doctor_id',
    ];
    public function doctors(){
        return $this->belongsTo(related:Doctor::class,foreignKey:'doctor_id');
    }
    public function users(){
        return $this->belongsTo(related:User::class,foreignKey:'user_id');
    }
}
