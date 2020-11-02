<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = ['title', 'contacts'];

    public function tours()                              
    {
        return $this->hasMany(Tour::class);              
    }
}
