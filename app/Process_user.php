<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process_user extends Model
{
    protected $fillable = [
        'user_id','description_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
