<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    // public function eventType()
    // {
    //     return $this->belongsTo('App\Models\EventType');
    // }
}
