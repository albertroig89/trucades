<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        'user_id', 'client_id', 'status_id', 'user_id2', 'callinf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function stat()
    {
        return $this->belongsTo(Stat::class);
    }
}
