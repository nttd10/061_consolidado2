<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'name','description','procedure_id'
    ];

    public function procedure()
    {
        return $this->belongsTo('App\Procedure','procedure_id');
    }
}
