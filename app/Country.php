<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['title'];

    public function tours()                              
    {
        return $this->hasMany(Tour::class);              
    }

    // public static function add($fields) 
    // {
    //     $country = new static;
    //     $country->fill($fields);
    //     $country->save();

    //     return $country;
    // }


    //Нужна виза или нет
    public function need()
    {
        $this->visa = 1;
        $this->save();
    }

    public function needNot()
    {
        $this->visa = 0;
        $this->save();
    }

    //переключатель
    public function toggleVisa($value) //переключить
    {
        if ($value == null)
        {
            return $this->needNot();
        }
        return $this->need();
    }
}
