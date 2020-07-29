<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'name','description',
    ];

    public function listing()
    {
        return $this->hasMany('App\Listing');
    }

    public function procedure()
    {
        return $this->hasMany('App\Procedure');
    }

    public function document()
    {
        return $this->hasMany('App\Document');
    }

    public function user()
    {
        return $this->belongsToMany('App\User','process_users');
    }
}
