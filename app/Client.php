<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";

    protected $fillable = [
        'name', 'email'
    ];

    public function client()
    {
        return $this->hasMany(Call::class);
    }

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            $query->where('name', "LIKE", "%$name%");
        }
    }
}
