<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sales(){
        return $this->belongsTo('App\Sales', 'sales_id');
    }

    public function barang(){
        return $this->belongsTo('App\Barang', 'barang_id');
    }
}
