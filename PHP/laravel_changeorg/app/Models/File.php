<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['nombre', 'path', 'peticione_id'];
    public function peticionegay()
    {
        return $this->belongsTo(Peticione::class);
    }


}
