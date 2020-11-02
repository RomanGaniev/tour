<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{

    protected $fillable = ['title', 'tour_id', 'people', 'full_cost', 'discount', 'discount_price'];

    public function tour()                              
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');             
    }

    public function orders()                              
    {
        return $this->hasMany(Order::class);             
    }





    public function foodYes()
    {
        $this->food = 1;
        $this->save();
    }

    public function foodNot()
    {
        $this->food = 0;
        $this->save();
    }

    //переключатель
    public function toggleFood($value) //переключить
    {
        if ($value == null)
        {
            return $this->foodNot();
        }
        return $this->foodYes();
    }



    public function resYes()
    {
        $this->residence = 1;
        $this->save();
    }

    public function resNot()
    {
        $this->residence = 0;
        $this->save();
    }

    //переключатель
    public function toggleRes($value) //переключить
    {
        if ($value == null)
        {
            return $this->resNot();
        }
        return $this->resYes();
    }


    public function fire()
    {
        $this->status = 1;
        $this->save();
    }

    public function fireNot()
    {
        $this->status = 0;
        $this->save();
    }

    //переключатель
    public function toggleFire($value) //переключить
    {
        if ($value == null)
        {
            return $this->fireNot();
        }
        return $this->fire();
    }
}
