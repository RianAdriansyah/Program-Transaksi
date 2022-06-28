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
                  {{ csrf_field() }}
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
                  {{ csrf_field() }}
                  <div class="mb-3">
                  <select name="customer_id" id="customer_id" class="form-control" onchange="pilih_customer()">
                    
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customer as $data)
                    <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>
                    @endforeach
                  </select>                  
                                  
                </div>
                  <div class="mb-3">
                    {{-- <label for="namacustomer" class="form-label">Nama</label> --}}
                    <input type="text" class="form-control" id="namacustomer" name="namacustomer" placeholder="Nama Customer" readonly>
                  </div>                
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="text" class="form-control" placeholder="No Telepon" aria-label="telp" name="telp" id="telp" aria-describedby="basic-addon1" readonly>
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
              <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modaltambah">
                Tambah Barang
              </button>
              <div class="table-responsive">
                <form action="" method="post">
                  {{ csrf_field() }}

                  <table class="table table-bordered" id="tabel1">
                    <thead>
                      <tr>
                          <th scope="col" rowspan="2" colspan="1" class="align-middle text-center"><a class="btn btn-sm btn-primary" id="tambah"><i class="bi bi-plus"></i></a></th>
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
                        <td class="text-center"><button class="btn btn-sm btn-danger" id="hapus"><i class="bi bi-trash"></i></button></td>
                        <td>1</td>
                        <td>
                          <select name="barang_id" id="barang_id" class="form-control" onchange="pilih_barang()">
                          <option value="">-- Pilih Barang --</option>
                          @foreach($barang as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>
                          @endforeach
                        </select>  
                        </td>
                        <td><input type="text" class="form-control" id="namabarang" name="namabarang" readonly></td>
                        <td><input type="text" class="form-control" id="qty" name="qty" oninput="hargatotal()"></td>
                        <td><input type="text" class="form-control" id="hargabandrol" name="hargabandrol" readonly></td>
                        <td><input type="text" class="form-control" id="diskon_pct" name="diskon_pct" oninput="harga_total()"></td>
                        <td><input type="text" class="form-control" id="diskon_rp" name="diskon_rp"></td>
                        <td><input type="text" class="form-control" id="hrgdiskon" name="hrgdiskon"></td>
                        <td><input type="text" class="form-control" id="total" name="total" readonly></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11 d-flex justify-content-end">
              <table>
                <tr>
                  <th class="text-start">Subtotal</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="subtotal" id="subtotal" oninput="hargatotal()" class="form-control text-end" style="height: 30px" readonly></td>
                </tr>
                <tr>
                  <th class="text-start">Diskon</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="diskon" id="diskon" oninput="total_bayar()" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Ongkir</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="ongkir" id="ongkir" oninput="total_bayar()" class="form-control text-end" style="height: 30px"></td>
                </tr>
                <tr>
                  <th class="text-start">Total Bayar</th>
                  <td>&nbsp : &nbsp</td>
                  <td class="text-end"><input type="text" name="total_bayar" id="total_bayar" class="form-control text-end" style="height: 30px" readonly></td>                
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

      <!-- Modal -->
      <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="ubahcust" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Barang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                      <div class="mb-3">
                          <label for="kode" class="form-label">Kode Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control" onchange="pilih_barang()">
                          <option value="">-- Pilih Barang --</option>
                          @foreach($barang as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>
                          @endforeach
                        </select>  
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" name="" readonly>
                      </div>                    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" onchange="hargatotal()">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Bandrol</label>
                        <input type="text" class="form-control" id="hargabandrol" name="" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                         
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (%)</label>
                        <input type="text" class="form-control" id="diskon_pct" name="diskon_pct">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (Rp)</label>
                        <input type="text" class="form-control" id="diskon_rp" name="diskon_rp">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Diskon</label>
                        <input type="text" class="form-control" id="hrgdiskon" name="hrgdiskon">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total">
                      </div>    
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" id="submit">Simpan</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <script>
          $("#tgl").on("change", function (e){
            e.preventDefault();

          $("#no").val(e.target.value.replace("-", ""))
          })

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          function pilih_customer(){
            var customer_id = $("#customer_id").val();
            
            $.ajax({
              url: "{{ url('formulir/tampilCustomer') }}",
              data: "id=" +customer_id,
              method: "post",
              dataType: 'json',
              success: function(data)
              {
                $("#namacustomer").val(data.nama);
                $("#telp").val(data.telp);
              }
            });
          }

          </script>

          <script>
            
            $(document).ready(function(){
              let baris = 1
            
              $(document).on('click', '#tambah', function (){
                baris = baris + 1
                var html = "<tr id='baris'" +baris+ ">"
                  html += "<td><button data-row='baris'"+baris+" class='btn btn-sm btn-danger' id='hapus'><i class='bi bi-trash'></i></button></td>"
                    html +="<td>"+baris+"</td>"
                    html += "<td><select name='barang_id' id='barang_id' class='form-control' onchange='pilih_barang()'><option value=''>-- Pilih Barang --</option>@foreach($barang as $data)<option value='{{ $data->id }}'>{{ $data->kode }} -- {{ $data->nama }}</option>@endforeach</select>  </td>"
                    html += "<td><input type='text' class='form-control' id='namabarang' name='namabarang' readonly></td>"
                    html += "<td><input type='text' class='form-control' id='qty' name='qty'></td>"
                    html += "<td><input type='text' class='form-control' id='hargabandrol' name='hargabandrol' readonly></td>"
                    html += "<td><input type='text' class='form-control' id='diskon-pct' name='diskon_pct'></td>"
                    html += "<td><input type='text' class='form-control' id='diskon_rp' name='diskon_rp'></td>"
                    html += "<td><input type='text' class='form-control' id='hrgdiskon' name='hrgdiskon'></td>"
                    html += "<td><input type='text' class='form-control' id='total' name='total'></td>"
                    html += "</tr>"
            
                    $('#tabel1').append(html)
              })
            })

            $(document).on('click', '#hapus', function (){
              let hapus = $(this).data('row')
              $(this).parent().parent().remove()
            })

          function pilih_barang(){
                    var barang_id = $("#barang_id").val();

                    $.ajax({
                      url: "{{ url('formulir/tampilBarang') }}",
                      data: "id=" +barang_id,
                      method: "post",
                      dataType: 'json',
                      success: function(data)
                      {
                        $('#namabarang').val(data.nama);
                        $('#hargabandrol').val(data.harga);
                      }
                    })
                  }

          </script>

          <script>

          function total_bayar(){
            var diskon = document.getElementById("diskon").value;
            var ongkir = document.getElementById("ongkir").value;
            var subtotal = document.getElementById('subtotal').value;
            var totalbayar = parseInt(subtotal) - parseInt(diskon) - parseInt(ongkir);

            if(!isNaN(totalbayar)){
              document.getElementById("total_bayar").value=totalbayar;
            }

          }

          // function diskon_pct(){
          //   var rp = document.getElementById("diskon_rp").value;
          //   var hargabandrol = document.getElementById('hargabandrol').value;
          //   var rp = document.getElementById("hrg").value;

          //   var pct = parseInt(hargabandrol) % parseInt(rp);

          //   if(!isNaN(pct)){
          //     document.getElementById("diskon_pct").value=pct;
          //   }
          // }

          function harga_total(){
            var pct = document.getElementById("diskon_pct").value;
            var qty = document.getElementById("qty").value;
            var bandrol = document.getElementById("hargabandrol").value;

            var tanpadiskon = parseInt(bandrol) * parseInt(qty);

            var diskonrp = parseInt(bandrol) * parseInt(pct) / 100;

            var diskon = parseInt(bandrol) - parseInt(diskonrp);

            var total = diskon * parseInt(qty);

            if(diskonrp | diskon | total){
              document.getElementById("diskon_rp").value=diskonrp;
              document.getElementById("hrgdiskon").value=diskon;
              document.getElementById("total").value=total;
              document.getElementById("subtotal").value=total;
            }
            else{
              document.getElementById("diskon_rp").value=0;
              document.getElementById("hrgdiskon").value=0;
              document.getElementById("total").value=tanpadiskon;
              document.getElementById("subtotal").value=tanpadiskon;

            }
          }

          // function hargatotal(){
          //   var qty = document.getElementById('qty').value;
          //   var pct = document.getElementById('diskon_pct').value;
          //   var bandrol = document.getElementById('hargabandrol').value;
          //   var subtotal = document.getElementById('subtotal').value;

          //   // var diskonrp = parseInt(bandrol) * parseInt(pct) / 100;

          //   // var diskon = parseInt(diskonrp) * parseInt(qty);
            
          //   var total = diskon * parseInt(qty);
          //   // var subtotal = parseInt(qty) * parseInt(bandrol);

          //   if(!isNaN(diskonrp | diskon | total)){
              
          //     document.getElementById("total").value=total;
          //       // document.getElementById("subtotal").value=subtotal;
          //     }

          // }

          </script>

  @endsection