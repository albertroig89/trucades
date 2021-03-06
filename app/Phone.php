<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = "phones";

    protected $fillable = [
        'client_id', 'phone'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
