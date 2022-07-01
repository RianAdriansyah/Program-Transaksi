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
                <form action="formulir" method="post">
                  {{ csrf_field() }}
                  <?php 
                  $no = $salesno;
                  $no++;
                  
                  ?>
                  <div class="mb-3">
                    <label for="no" class="form-label">No</label>
                    <input type="text" class="form-control" name="no" value="{{ date('Ym') }}-{{ str_pad($no, 4, '0', STR_PAD_LEFT) }}" readonly>
                    @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error ('tgl') is-invalid @enderror" id="tgl" name="tgl" required>
                    @error('tgl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                  {{ csrf_field() }}
                  <div class="mb-3">
                  <select name="customer_id" id="customer_id" class="form-control" onchange="pilih_customer()" required>
                    
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customer as $data)
                    <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>
                    @endforeach
                  </select>                  
                  @error('customer_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror   
                </div>
                  <div class="mb-3">
                    {{-- <label for="namacustomer" class="form-label">Nama</label> --}}
                    <input type="text" class="form-control" id="namacustomer" name="namacustomer" placeholder="Nama Customer" readonly>
                  </div>                
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="text" class="form-control" placeholder="No Telepon" aria-label="telp" name="telp" id="telp" aria-describedby="basic-addon1" readonly>
                  </div>           
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 mt-3">

          @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
          @endif
        </div>
      </div>
  
    </section>

    {{-- TABEL --}}

      <section class="tabel">
        <div class="container">
          <div class="row mt-4">
            <div class="col-lg-12 table-responsive">
              <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modaltambah">
                Tambah Barang
              </button>
                  {{ csrf_field() }}
                  <style>
                    .dataTables_filter {
                      display: none;
                      }
                  </style>

                  <table class="table table-bordered table-striped" id="">
                    <thead>
                      <tr>
                          {{-- <th scope="col" rowspan="2" colspan="1" class="align-middle text-center"><a class="btn btn-sm btn-primary" id="tambah"><i class="bi bi-plus"></i></a></th> --}}
                          <th scope="col" rowspan="2" class="align-middle">No</th>
                          <th scope="col" rowspan="2" class="align-middle">Kode Barang</th>
                          <th scope="col" rowspan="2" class="align-middle">Nama Barang</th>
                          <th scope="col" rowspan="2" class="align-middle">Qty</th>
                          <th scope="col" rowspan="2" class="align-middle">Harga Bandrol</th>
                          <th scope="col" colspan="2" class="text-center">Diskon</th>
                          <th scope="col" rowspan="2" class="align-middle">Harga Diskon</th>
                          <th scope="col" rowspan="2" class="align-middle">Total</th>
                          <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                      </tr>
                      <tr class="text-center">
                          <th scope="col">(%)</th>
                          <th scope="col">(Rp)</th>
                      </tr>
                    </thead>
                    <tbody id="data-barang">
                      <?php $subtotal = 0; ?>
                      @if ($databackup->count())
                      @foreach ($databackup as $item)
                      <?php $subtotal += $item->total; ?>
                          
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <input type="hidden" value="{{ $item->barang_id }}" name="barang_id[]">
                          <input type="hidden" name="id" value="">
                          <input type="text" class="form-control" name="" id="" value="{{ $item->barangs->kode }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="" id="" value="{{ $item->barangs->nama }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="qty[]" id="" value="{{ $item->qty }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="hargabandrol[]" id="" value="{{ $item->harga_bandrol }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="diskon_pct[]" id="" value="{{ $item->diskon_pct }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="diskon_rp[]" id="" value="{{ $item->diskon_nilai }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="hrgdiskon[]" id="" value="{{ $item->harga_diskon }}" readonly>
                        </td> 
                        <td>
                          <input type="text" class="form-control" name="total[]" id="totalawal" value="{{ $item->total }}" readonly>
                        </td> 
                        <td class="d-flex justify-content-evenly">

                          <a href="{{ route('formulir.edit', $item->id) }}" class="btn btn-sm btn-success mx-1"><i class="bi bi-pencil-square"></i></a>
                        <button id="hapusbarang" class="btn btn-sm btn-danger mx-1" type="button" data-myid="{{ $item->id }}"><i class="bi bi-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tbody>
                        <tr>
                          <td colspan="11">
                            <h5 class="text-center">Belum ada barang</h5>
                          </td>
                        </tr>
                      </tbody>
                      @endif
                    </tbody>
                    
                  </table>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-12 d-flex justify-content-end">
              <table>
                  {{ csrf_field() }}
                  <tr>
                    <th class="text-start">Subtotal</th>
                    <td>&nbsp : &nbsp</td>
                    <td class="text-end"><input type="text" name="subtotal" id="subtotalakhir" class="form-control text-end" style="height: 30px" onclick="total_akhir()" value="{{ $subtotal }}" readonly></td>
                  </tr>
                  <tr>
                    <th class="text-start">Diskon</th>
                    <td>&nbsp : &nbsp</td>
                    <td class="text-end"><input type="text" name="diskon" id="diskonakhir" oninput="bayar_akhir()" class="form-control text-end" style="height: 30px" required></td>
                  </tr>
                  <tr>
                    <th class="text-start">Ongkir</th>
                    <td>&nbsp : &nbsp</td>
                    <td class="text-end"><input type="text" name="ongkir" id="ongkirakhir" oninput="bayar_akhir()" class="form-control text-end" style="height: 30px" required>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-start">Total Bayar</th>
                    <td>&nbsp : &nbsp</td>
                    <td class="text-end"><input type="text" name="total_bayar" id="total_bayarakhir" class="form-control text-end" style="height: 30px" readonly></td>                
                  </tr>
                </table>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-12 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              <a href="/batal" class="btn btn-secondary">Batal</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Modal TAMBAH BARANG -->
      <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="modaltambah" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Barang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                    <form action="formulir/createBackup" method="POST">
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
                        <input type="text" class="form-control" id="namabarang" name="namabarang" readonly>
                      </div>                    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" oninput="harga_total()">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Bandrol</label>
                        <input type="text" class="form-control" id="hargabandrol" name="hargabandrol" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                         
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (%)</label>
                        <input type="text" class="form-control" id="diskon_pct" oninput="harga_total()" name="diskon_pct">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (Rp)</label>
                        <input type="text" class="form-control" id="diskon_rp" name="diskon_rp" readonly>
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Diskon</label>
                        <input type="text" class="form-control" id="hrgdiskon" name="hrgdiskon" readonly>
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                      </div>    
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-lg-6">
                      <table>
                        {{ csrf_field() }}
                        <tr>
                          <th class="text-start">Subtotal</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="subtotal" id="subtotal" class="form-control text-end" style="height: 30px" readonly></td>
                        </tr>
                        <tr>
                          <th class="text-start">Diskon</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="diskon" id="diskon" oninput="bayar()" class="form-control text-end" style="height: 30px"></td>
                        </tr>
                        <tr>
                          <th class="text-start">Ongkir</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="ongkir" id="ongkir" oninput="bayar()" class="form-control text-end" style="height: 30px"></td>
                        </tr>
                        <tr>
                          <th class="text-start">Total Bayar</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="total_bayar" id="total_bayar" class="form-control text-end" style="height: 30px" readonly></td>                
                        </tr>
                      </table>
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

      {{-- MODAL EDIT BARANG  --}}

      <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="modaledit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Barang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                    <form action="formulir/updateBackup/{{ $data->id }}" method="POST">
                      @method('put')
                      @csrf
                      <input type="hidden" name="id_data" value="" name="id">
                      <div class="mb-3">
                          <label for="kode" class="form-label">Kode Barang</label>
                        <select name="barang_id" id="barang_id2" class="form-control" onchange="pilih_barang2()">
                          <option value="">-- Pilih Barang --</option>
                          @foreach($barang as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>
                          @endforeach
                        </select>  
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang2" name="namabarang" value="" onclick="pilih_barang2()" readonly>
                      </div>                    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="qty2" name="qty" oninput="harga_total2()">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Bandrol</label>
                        <input type="text" class="form-control" id="hargabandrol2" name="hargabandrol" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                         
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (%)</label>
                        <input type="text" class="form-control" id="diskon_pct2" oninput="harga_total2()" name="diskon_pct">
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (Rp)</label>
                        <input type="text" class="form-control" id="diskon_rp2" name="diskon_rp" readonly>
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Diskon</label>
                        <input type="text" class="form-control" id="hrgdiskon2" name="hrgdiskon" readonly>
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total2" name="total" readonly>
                      </div>    
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-lg-6">
                      <table>
                        {{ csrf_field() }}
                        <input type="hidden" name="" id="id_data" value="">
                        <tr>
                          <th class="text-start">Subtotal</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="subtotal" id="subtotal2" class="form-control text-end" style="height: 30px" readonly></td>
                        </tr>
                        <tr>
                          <th class="text-start">Diskon</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="diskon" id="diskon2" oninput="bayar2()" class="form-control text-end" style="height: 30px"></td>
                        </tr>
                        <tr>
                          <th class="text-start">Ongkir</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="ongkir" id="ongkir2" oninput="bayar2()" class="form-control text-end" style="height: 30px"></td>
                        </tr>
                        <tr>
                          <th class="text-start">Total Bayar</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="total_bayar" id="total_bayar2" class="form-control text-end" onmousemove="bayar2()" style="height: 30px" readonly></td>                
                        </tr>
                      </table>
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

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          // $("#tgl").on("change", function (e){
          //   e.preventDefault();

          // $("#no").val(e.target.value.replace("-", ""))
          // })

          // HAPUS BARANG

          $("#data-barang").on("click", "#hapusbarang", function (e){
            e.preventDefault();

              var id = $(this).data("myid");
              var token = $("meta[name='csrf-token']").attr("content");
            
              $.ajax(
              {
                  url: "/formulir/deletebackup/"+id,
                  type: 'DELETE',
                  dataType: 'JSON',
                  data: {
                      "myid": id,
                      "_token": token,
                  },
                  success: function (response){
                      console.log(response);
                        location.reload();
                  },
                  error: function(xhr){
                    console.log(xhr.responseText);
                  }
              });
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

          // FUNGSI MODAL EDIT

          function pilih_barang2(){
            var barang_id = $("#barang_id2").val();

            $.ajax({
              url: "{{ url('formulir/tampilBarang') }}",
              data: "id=" +barang_id,
              method: "post",
              dataType: 'json',
              success: function(data)
              {
                $('#namabarang2').val(data.nama);
                $('#hargabandrol2').val(data.harga);
              }
            })
          }

          function bayar(){
            var diskon = document.getElementById("diskon").value;
            var ongkir = document.getElementById("ongkir").value;
            var subtotal = document.getElementById("subtotal").value;
            var totalbayar = parseInt(subtotal) - parseInt(diskon) + parseInt(ongkir);

            if(!isNaN(totalbayar)){
              document.getElementById("total_bayar").value=totalbayar;
            }

          }

          // FUNGSI MODAL EDIT
          function bayar2(){
            var diskon = document.getElementById("diskon2").value;
            var ongkir = document.getElementById("ongkir2").value;
            var subtotal = document.getElementById("subtotal2").value;
            var totalbayar = parseInt(subtotal) - parseInt(diskon) + parseInt(ongkir);

            if(!isNaN(totalbayar)){
              document.getElementById("total_bayar2").value=totalbayar;
            }

          }

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
          // FUNGSI MODAL EDIT
          function harga_total2(){
            var pct = document.getElementById("diskon_pct2").value;
            var qty = document.getElementById("qty2").value;
            var bandrol = document.getElementById("hargabandrol2").value;

            var tanpadiskon = parseInt(bandrol) * parseInt(qty);

            var diskonrp = parseInt(bandrol) * parseInt(pct) / 100;

            var diskon = parseInt(bandrol) - parseInt(diskonrp);

            var total = diskon * parseInt(qty);

            if(diskonrp | diskon | total){
              document.getElementById("diskon_rp2").value=diskonrp;
              document.getElementById("hrgdiskon2").value=diskon;
              document.getElementById("total2").value=total;
              document.getElementById("subtotal2").value=total;
            }
            else{
              document.getElementById("diskon_rp2").value=0;
              document.getElementById("hrgdiskon2").value=0;
              document.getElementById("total2").value=tanpadiskon;
              document.getElementById("subtotal2").value=tanpadiskon;

            }
          }

          function total_akhir(){
            var total = document.getElementById("totalawal").value;
            var subtotal = 0;
            // var subtotal = document.getElementById("subtotalakhir");

            for(i = 0 ; i <= total.length ; i++){
              subtotal += total[i];
              console.log(total[i]);

            }

          }
          function bayar_akhir(){
            var diskon = document.getElementById("diskonakhir").value;
            var ongkir = document.getElementById("ongkirakhir").value;
            var subtotal = document.getElementById("subtotalakhir").value;
            var totalbayar = parseInt(subtotal) - parseInt(diskon) + parseInt(ongkir);

            if(!isNaN(totalbayar)){
              document.getElementById("total_bayarakhir").value=totalbayar;
            }
          }

            // MODAL EDIT
        //    $('#modaledit').on('show.bs.modal', function (event){
        //   var button = $(event.relatedTarget);
        //   var bandrol = button.data('mybandrol');
        //   var qty = button.data('myqty');
        //   var pct = button.data('mypct');
        //   var rp = button.data('myrp');
        //   var hrgdiskon = button.data('myhrgdiskon');
        //   var total = button.data('mytotal');
        //   var subtotal = button.data('mysubtotal');
        //   var diskon = button.data('mydiskon');
        //   var ongkir = button.data('myongkir');
        //   var totalbayar = button.data('mytotalbayar');
        //   var barang = button.data('mybarang');
        //   var id_data = button.data('id_data');

        //   var modal = $(this)
        //   modal.find('#harga_bandrol2').val(bandrol);
        //   modal.find('#qty2').val(qty);
        //   modal.find('#diskon_pct2').val(pct);
        //   modal.find('#diskon_rp2').val(rp);
        //   modal.find('#hrgdiskon2').val(hrgdiskon);
        //   modal.find('#total2').val(total);
        //   modal.find('#subtotal2').val(subtotal);
        //   modal.find('#diskon2').val(diskon);
        //   modal.find('#ongkir2').val(ongkir);
        //   modal.find('#totalbayar2').val(totalbayar);
        //   modal.find('#barang_id2').val(barang);
        //   modal.find('#id_data').val(id_data);
        // })    

          </script>

  @endsection