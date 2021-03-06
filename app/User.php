<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByEmail($email)
    {
        return static::where(compact('email'))->first();
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    protected $casts = [
        'is_admin' => 'boolean'
    ];

//    public function profile()
//    {
//        return $this->hasOne(UserProfile::class);
//    }

    public function isAdmin()
    {
        return $this->is_admin;
    }
}
