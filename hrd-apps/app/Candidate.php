<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
