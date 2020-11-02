<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title', 'permit_id', 'klient'];

    public function permit()                              
    {
        return $this->belongsTo(Permit::class);             
    }
    
    public function tour()                              
    {
        return $this->hasOne(Tour::class);             
    }


    public function paid()
    {
        $this->oplata = 1;
        $this->save();
    }

    public function paidNot()
    {
        $this->oplata = 0;
        $this->save();
    }

    //переключатель
    public function togglePayment($value) //переключить
    {
        if ($value == null)
        {
            return $this->paidNot();
        }
        return $this->paid();
    }
}
