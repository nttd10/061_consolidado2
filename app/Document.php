<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name','description','typedocument_id','process_id'
    ];

    public function typedocument()
    {
        return $this->belongsTo('App\Typedocument','typedocument_id');
    }

    public function process()
    {
        return $this->belongsTo('App\Process','process_id');
    }
}
