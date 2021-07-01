<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistJob extends Model
{
    protected $fillable = [
        'username', 'job', 'inittime', 'endtime', 'totalmin', 'clientname',
    ];
}
