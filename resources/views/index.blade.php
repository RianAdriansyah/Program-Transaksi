@extends('layouts.main')    

  @section('content')
      
  <section class="tabel-transaksi">
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-lg-12 table-responsive">
          <h5 class="my-4">Daftar Transaksi</h5>
          <table class="table" id="datatables">
            <thead>
              <tr>
                <th>No</th>
                <th>Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Customer</th>
                <th>Jumlah Barang</th>
                <th>Subtotal</th>
                <th>Diskon</th>
                <th>Ongkir</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($salesdetail as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->sales->kode }}</td>
                <td>{{ $item->sales->tgl }}</td>
                <td>{{ $item->sales->customer_id }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->sales->subtotal }}</td>
                <td>{{ $item->sales->diskon }}</td>
                <td>{{ $item->sales->ongkir }}</td>
                <td>{{ $item->sales->total_bayar }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-end">Grand Total</th>
                <th colspan="3" class="text-end">60000</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>

  @endsection