<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'kode' => 'A001',
            'nama' => 'Barang A',
            'harga' => '250000'
        ]);
        Barang::create([
            'kode' => 'C025',
            'nama' => 'Barang B',
            'harga' => '300000'
        ]);
        Barang::create([
            'kode' => 'A102',
            'nama' => 'Barang C',
            'harga' => '5000000'
        ]);
        Barang::create([
            'kode' => 'A301',
            'nama' => 'Barang D',
            'harga' => '2000000'
        ]);
        Barang::create([
            'kode' => 'B221',
            'nama' => 'Barang E',
            'harga' => '2800000'
        ]);


        Customer::create([
            'kode' => 'BB0001',
            'nama' => 'Cust A',
            'telp' => '081910186646'
        ]);
        Customer::create([
            'kode' => 'BB0002',
            'nama' => 'Cust B',
            'telp' => '089992833667'
        ]);
        Customer::create([
            'kode' => 'BB0003',
            'nama' => 'Cust C',
            'telp' => '081938452284'
        ]);
        Customer::create([
            'kode' => 'BB0004',
            'nama' => 'Cust D',
            'telp' => '087821377634'
        ]);
        Customer::create([
            'kode' => 'BB0005',
            'nama' => 'Cust E',
            'telp' => '083256347368'
        ]);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
