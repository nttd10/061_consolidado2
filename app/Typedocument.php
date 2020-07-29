<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typedocument extends Model
{
    protected $fillable = [
        'name','description'
    ];

    public function document()
    {
        return $this->hasMany('App\Document');
    }
}
