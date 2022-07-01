<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBackup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    

    protected $fillable = ['harga_bandrol', 'qty', 'diskon_pct', 'diskon_nilai', 'harga_diskon', 'total', 'barang_id', 'sales_id', 'customer_id'];

    public function sales(){
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function barangs(){
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
