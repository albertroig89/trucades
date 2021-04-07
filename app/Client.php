<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function client()
    {
        return $this->hasMany(Call::class);
    }
}
