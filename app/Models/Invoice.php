<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_date',
        'customer_id'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function hardware()
    {
        return $this->belongsToMany(Hardware::class, 'invoice_equipment')->distinct();
    }

    public function number_of_items()
    {
        return count($this->hardware);
    }

    public function total_price()
    {
        $retval = 0;
        $hardware = $this->hardware;

        foreach($hardware AS $hardware)
        {
            $retval +=  $hardware->price;
        }

        return $retval;
    }

}