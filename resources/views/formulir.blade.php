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
                    <input type="text" class="form-control" id="no" name="no">
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
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
                    <label for="kode" class="form-label">Kode, Nama, Telepon Customer</label>
                  <select name="customer_id" class="form-control">
                    
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customer as $data)
                    <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }} -- +62{{ $data->telp }}</option>
                    @endforeach
                  </select>                  
                                  
                </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                  </div>                
                  <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telp" name="telp">
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

                <table class="table table-bordered" id="tabel1">
                  <thead>
                    <tr>
                        <th scope="col" rowspan="2" colspan="1" class="align-middle text-center"><button class="btn btn-sm btn-primary" id="tambah"><i class="bi bi-plus"></i></button></th>
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
                      {{-- <td class="text-center"><button class="btn btn-sm btn-success" id="tambah"><i class="bi bi-pencil-square"></i></button></td> --}}
                      <td class="text-center"><button class="btn btn-sm btn-danger" id="hapus"><i class="bi bi-trash"></i></button></td>
                      <td>1</td>
                      <td><select name="customer_id" class="form-control">
                    
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $data)
                    <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }} -- {{ $data->harga }}</option>
                    @endforeach
                  </select>  </td>
                      <td><input type="text" class="form-control" id="namabarang" name=""></td>
                      <td><input type="text" class="form-control" id="qty" name=""></td>
                      <td><input type="text" class="form-control" id="harga" name=""></td>
                      <td><input type="text" class="form-control" id="diskon" name=""></td>
                      <td><input type="text" class="form-control" id="hrgdiskon" name=""></td>
                      <td><input type="text" class="form-control" id="total" name=""></td>
                      <td></td>
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
                  <td class="text-end"><input type="text" name="subtotal" id="" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Diskon</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="diskon" id="" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Ongkir</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="ongkir" id="" class="form-control text-end" style="height: 30px"></td>
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

      <script>

        let i = 99;

          $("#tgl").on("change", function (e){
            e.preventDefault();

          $("#no").val(e.target.value.replace("-", ""))
          })



          
          </script>

<script>
  
  $(document).ready(function(){
    let baris = 1
  
    $(document).on('click', '#tambah', function (){
      baris = baris + 1
      var html = "<tr id='baris'" +baris+ ">"
        html += "<td><button data-row='baris'"+baris+" class='btn btn-sm btn-danger' id='hapus'><i class='bi bi-trash'></i></button></td>"
          html +="<td>"+baris+"</td>"
          html += "<td id='barang_id'><input type='text' class='form-control' id='barang_id' name=''></td>"
          html += "<td id='total'><select name='baang_id' class='form-control'><option value=''>-- Pilih Barang --</option>@foreach($barang as $data)<option value='{{ $data->id }}''>{{ $data->kode }} -- {{ $data->nama }}</option>@endforeach</select></td>"
          html += "<td id='namabarang'><input type='text' class='form-control' id='namabarang' name=''></td>"
          html += "<td id='qty'><input type='text' class='form-control' id='qty' name=''></td>"
          html += "<td id='bandrol'><input type='text' class='form-control' id='bandrol' name=''></td>"
          html += "<td id='diskon'><input type='text' class='form-control' id='diskon' name=''></td>"
          html += "<td id='hrgdiskon'><input type='text' class='form-control' id='hrgdiskon' name=''></td>"
          html += "<td></td>"
          html += "</tr>"
  
          $('#tabel1').append(html)
    })
  })

  $(document).on('click', '#hapus', function (){
    let hapus = $(this).data('row')
    $('#' + hapus).remove()
  })
      </script>

  @endsection