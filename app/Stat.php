<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
        'title'
    ];

    public function stat()
    {
        return $this->hasMany(Call::class);
    }
}
