<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistJob2 extends Model
{
    protected $table = "hist_jobs2";

    protected $fillable = [
        'username', 'job', 'inittime', 'endtime', 'totalmin', 'clientname',
    ];
}
