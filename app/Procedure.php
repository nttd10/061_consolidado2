<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    public $table = 'procedures';

    protected $fillable = [
        'name','description','process_id'
    ];

    public function process()
    {
        return $this->belongsTo('App\Process','process_id');
    }

    public function register()
    {
        return $this->hasMany('App\Register');
    }
}
