@extends('layouts.main')    

  @section('content')
      
{{-- FORM INPUT --}}

<section class="form-input">

  <div class="container mt-4">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Transaksi</h5>
                <form>
                  <div class="mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="">
                  </div>                
                </form>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <form>
                  <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="">
                  </div>                
                  <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="">
                  </div>                
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>

    {{-- TABEL --}}

      <section class="tabel">
        <div class="container">
          <div class="row mt-4">
            <div class="col-lg-12">
              <div class="table-responsive">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th scope="col" rowspan="2" colspan="2" class="align-middle text-center"><button class="btn btn-sm btn-primary">Tambah</button></th>
                        <th scope="col" rowspan="2" class="align-middle">No</th>
                        <th scope="col" rowspan="2" class="align-middle">Kode Barang</th>
                        <th scope="col" rowspan="2" class="align-middle">Nama Barang</th>
                        <th scope="col" rowspan="2" class="align-middle">Qty</th>
                        <th scope="col" rowspan="2" class="align-middle">Harga Bandrol</th>
                        <th scope="col" colspan="2" class="text-center">Diskon</th>
                        <th scope="col" rowspan="2" class="align-middle">Harga Diskon</th>
                        <th scope="col" rowspan="2" class="align-middle">Total</th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">(%)</th>
                        <th scope="col">(Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><a href="" class="btn btn-sm btn-success">Ubah</a></td>
                      <td class="text-center"><a href="" class="btn btn-sm btn-danger">Hapus</a></td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                      <td>1000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11 d-flex justify-content-end">
              <table>
                <tr>
                  <th class="text-start">Subtotal</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end">20000</td>
                </tr>
                <tr>
                  <th class="text-start">Diskon</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="" id="" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Ongkir</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="" id="" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Total Bayar</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end">203333000</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-evenly">
              <a href="" class="btn btn-primary">Simpan</a>
              <a href="" class="btn btn-secondary">Batal</a>
            </div>
          </div>
        </div>
      </section>

  @endsection