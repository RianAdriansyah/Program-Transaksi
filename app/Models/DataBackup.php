<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBackup extends Model
{
    use HasFactory;

    public function barangs(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
