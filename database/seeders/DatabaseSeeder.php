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
            'kode' => 'AA0001',
            'nama' => 'Keyboard',
            'harga' => '250000'
        ]);
        Barang::create([
            'kode' => 'AA0002',
            'nama' => 'Mouse',
            'harga' => '300000'
        ]);
        Barang::create([
            'kode' => 'AA0003',
            'nama' => 'Monitor',
            'harga' => '5000000'
        ]);
        Barang::create([
            'kode' => 'AA0004',
            'nama' => 'Motherboard',
            'harga' => '2000000'
        ]);
        Barang::create([
            'kode' => 'AA0005',
            'nama' => 'Power Supply',
            'harga' => '2800000'
        ]);


        Customer::create([
            'kode' => 'BB0001',
            'nama' => 'Rian Adriansyah',
            'telp' => '081910186646'
        ]);
        Customer::create([
            'kode' => 'BB0002',
            'nama' => 'Zayn Malik',
            'telp' => '089992833667'
        ]);
        Customer::create([
            'kode' => 'BB0003',
            'nama' => 'Louis Tomlinson',
            'telp' => '081938452284'
        ]);
        Customer::create([
            'kode' => 'BB0004',
            'nama' => 'Harry Styles',
            'telp' => '087821377634'
        ]);
        Customer::create([
            'kode' => 'BB0005',
            'nama' => 'Niall Horan',
            'telp' => '083256347368'
        ]);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
