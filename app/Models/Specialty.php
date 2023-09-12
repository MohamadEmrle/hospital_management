<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
class Specialty extends Model
{
    use HasFactory;
    protected $table = 'specialtys';
    protected $fillable= [
        'spename_en',
        'spename_ar',
    ];
    public function doctors()
    {
        return $this->hasMany(related:Doctor::class,foreignKey:'specoalty_id',localKey:'id');
    }
}
