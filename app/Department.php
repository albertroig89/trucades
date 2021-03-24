<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'title',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
