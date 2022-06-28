<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\SalesDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::with('customers', 'barangs')->get();
        $customer = Customer::all();
        $barang = Barang::all();

        return view('formulir', compact('sales', 'customer', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $formattgl = Carbon::createFromFormat('d-m-Y', $request->tgl);

        $sales = new Sales;
        $sales->kode = $request->no;
        $sales->tgl = $request->tgl;
        $sales->customer_id = $request->customer_id;
        $sales->subtotal = $request->subtotal;
        $sales->diskon = $request->diskon;
        $sales->ongkir = $request->ongkir;
        $sales->total_bayar = $request->total_bayar;

        $sales->save();

        $salesdetail = new SalesDetail;
        $salesdetail->harga_bandrol = $request->hargabandrol;
        $salesdetail->qty = $request->qty;
        $salesdetail->diskon_pct = $request->diskon_pct;
        $salesdetail->diskon_nilai = $request->diskon_rp;
        $salesdetail->harga_diskon = $request->hrgdiskon;
        $salesdetail->total = $request->total;
        $salesdetail->sales_id = $sales->id;
        $salesdetail->barang_id = $request->barang_id;
        $salesdetail->save();

        return redirect('formulir');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tampilCustomer(Request $request){
        
        $customer = Customer::find(request('id'));
        return response()->json([
            'nama' => $customer->nama,
            'telp' => $customer->telp
        ]);
    }

    public function tampilBarang(Request $request){

        $barang = Barang::find(request('id'));
        return response()->json([
            'nama' => $barang->nama,
            'harga' => $barang->harga
        ]);
    }
}
