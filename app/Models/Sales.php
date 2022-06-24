<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales_detail(){
        return $this->hasMany(SalesDetail::class);
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
