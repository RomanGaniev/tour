<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['title', 'description', 'country_id', 'operator_id'];

    public function country()                              
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');              
    }

    public function operator()                              
    {
        return $this->belongsTo(Operator::class, 'operator_id', 'id');             
    }

    public function permits()                              
    {
        return $this->hasMany(Permit::class);             
    }

}
