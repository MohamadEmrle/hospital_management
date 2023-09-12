<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;
use App\Models\Date;
use App\Models\Detection;
use App\Models\Bill;
use App\Models\Price;
use App\Models\serviceProvider;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'doctors';
    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'phone',
        'photo',
        'description_en',
        'description_ar',
        'Profits_Dr',
        'Profits_center',
        'specoalty_id',
    ];
    
    public function specialtys()
    {   
        return $this->belongsTo(related:Specialty::class,foreignKey:'specoalty_id');
    }
    public function dates(){
        return $this->hasMany(related:Date::class,foreignKey:'doctor_id',localKey:'id');
    }
    public function detection(){
        return $this->hasMany(related:Detection::class,foreignKey:'doctor_id',localKey:'id');
    }
    public function bills(){
        return $this->hasMany(related:Bill::class,foreignKey:'doctor_id',localKey:'id');
    }
    public function prices(){
        return $this->hasMany(related:Price::class,foreignKey:'doctor_id',localKey:'id');
    }
    public function serviceProvider(){
        return $this->hasMany(related:serviceProvider::class,foreignKey:'doctor_id',localKey:'id');
    }
}
