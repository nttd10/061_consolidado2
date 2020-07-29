<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'user_id','process_id'
    ];

    public function process()
    {
        return $this->belongsTo('App\Process','process_id');
    }
}
