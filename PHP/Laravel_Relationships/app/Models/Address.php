<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'zipcode',
    ];

    public function user(){
        return $this->belongsTo(User::class); // Assuming User has a foreign key 'user_id' in the addresses table. You may change the model name and foreign key as per your database schema.  //
    }
    //
}
