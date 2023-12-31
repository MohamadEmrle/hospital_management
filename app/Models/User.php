<?php

namespace App\Models;

use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Detection;
use App\Models\File;
use App\Models\Comment;
use App\Models\Reward;
use App\Models\Bill;
use App\Models\service;
class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles, HasPermissions;
    use SoftDeletes;
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = !is_null($value) ? bcrypt($value) : $this->password;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'email',
        'phone',
        'password',
        'profile',
        'birthDate',
        'address',
        'question',
        'type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isSuperAdmin()
    {
        return $this->type_id == 1  ? true : false;
    }
    //  Admin
    //  Get Admins
    public function scopeAdmins($query)
    {
        return $query->where('type_id', 2);
    }

    //  Check is admin
    public function isAdmin()
    {
        return $this->type_id == 2  ? true : false;
    }

    // if user is admin , show admin's role
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    //
    //  User
    // Get All users
    public function scopeUsers($query)
    {
        return $query->where('type_id', 3);
    }

    // Check is user
    public function isUser()
    {
        return $this->type_id == 3  ? true : false;
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function profile()
    {
        return $this->profile ?? '/uploads/profiles/default/user.png';
    }
    public function detections(){
        return $this->hasMany(related:Detection::class,foreignKey:'user_id',localKey:'id');
    }
    public function files(){
        return $this->hasMany(related:File::class,foreignKey:'user_id',localKey:'id');
    }
    public function comments(){
        return $this->hasMany(related:Comment::class,foreignKey:'user_id',localKey:'id');
    }
    public function rewards(){
        return $this->hasMany(related:Reward::class,foreignKey:'user_id',localKey:'id');
    }
    public function bill(){
        return $this->hasMany(related:Bill::class,foreignKey:'user_id',localKey:'id');
    }
    public function service(){
        return $this->hasMany(related:service::class,foreignKey:'user_id',localKey:'id');
    }
}
