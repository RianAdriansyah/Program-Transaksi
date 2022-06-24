@extends('layouts.main')    

  @section('content')
      
  <section class="tabel-transaksi">
    <div class="container mt-3">
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
              <tr>
                <td>1</td>
                <td>202101-0001</td>
                <td>01-Jan-2021</td>
                <td>Cust A</td>
                <td>2</td>
                <td>250.000</td>
                <td>5000</td>
                <td>15000</td>
                <td>245.000</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6" class="text-end">Grand Total</th>
                <th colspan="4" class="text-end">60000</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </section>

  @endsection