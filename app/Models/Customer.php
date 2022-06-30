<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales(){
        return $this->hasMany(Sales::class);
    }
    public function sales_details(){
        return $this->hasMany(SalesDetail::class);
    }

}
