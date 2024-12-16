<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name', 'event_detail',
    ];
    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    /*public function eventType(){
    return $this->belongsTo('App\Models\EventType');
    }*/

    public function events()
    {
        return $this->belongsToMany('App\Models\Event')->withPivot('note')->withTimestamps();
}
}

