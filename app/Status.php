<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'status'
    ];

    public function status()
    {
        return $this->hasMany(Call::class);
    }
}
