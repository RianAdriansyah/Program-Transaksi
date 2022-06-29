<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\DataBackup;
use App\Models\SalesDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\TableRow;

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
        $databackup = DataBackup::with('customers', 'barangs')->latest()->get();
        $customer = Customer::all();
        $barang = Barang::all();

        return view('formulir', compact('sales', 'customer', 'barang', 'databackup'));
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
        // dd($request->all());

        $sales = new Sales;
        $sales->kode = $request->no;
        $sales->tgl = $request->tgl;
        $sales->customer_id = $request->customer_id;
        $sales->subtotal = $request->subtotal;
        $sales->diskon = $request->diskon;
        $sales->ongkir = $request->ongkir;
        $sales->total_bayar = $request->total_bayar;

        $sales->save();

        $harga= $request->hargabandrol;
        $qty= $request->qty;
        $pct= $request->diskon_pct;
        $rp= $request->diskon_rp;
        $hrg= $request->hrgdiskon;
        $ttl= $request->total;
        $barangid= $request->barang_id;
        $salesid= $sales->id;
        $cstmr= $request->customer_id;
        
        for ($i=0; $i < count($barangid); $i++) { 
            # code...
            $salesdetail = new SalesDetail;
            $salesdetail->harga_bandrol = $harga[$i];
            $salesdetail->qty = $qty[$i];
            $salesdetail->diskon_pct = $pct[$i];
            $salesdetail->diskon_nilai = $rp[$i];
            $salesdetail->harga_diskon = $hrg[$i];
            $salesdetail->total = $ttl[$i];
            $salesdetail->barang_id = $barangid[$i];
            $salesdetail->sales_id = $salesid;
            $salesdetail->customer_id = $cstmr;
            $salesdetail->save();
        }

        $backup = DataBackup::delete();

        return redirect('formulir')->with('success', 'Data berhasil ditambahkan!');
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
        $backup = DataBackup::findOrFail($id);
        $backup->delete();

        return redirect('formulir')->with('success', 'Data berhasil dihapus!');
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

    public function createBackup(Request $request)
    {
        $databackup = new DataBackup;
        $databackup->harga_bandrol = $request->hargabandrol;
        $databackup->qty = $request->qty;
        $databackup->diskon_pct = $request->diskon_pct;
        $databackup->diskon_nilai = $request->diskon_rp;
        $databackup->harga_diskon = $request->hrgdiskon;
        $databackup->total = $request->total;
        $databackup->subtotal = $request->subtotal;
        $databackup->diskon = $request->diskon;
        $databackup->ongkir = $request->ongkir;
        $databackup->total_bayar = $request->total_bayar;
        // $databackup->sales_id = $sales->id;
        $databackup->barang_id = $request->barang_id;
        $databackup->customer_id = $request->customer_id;
        $databackup->save();

        return redirect('formulir');
    }
}
