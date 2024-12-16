<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $fillable = [
        'description',
    ];
    public function eventType(){
        return $this->belongsTo('App\Models\EventType');
    }
    //
}
