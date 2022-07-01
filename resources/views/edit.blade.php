@extends('layouts.main')

@section('content')

<section class="edit">

    <div class="container">
        <div class="row mt-4">
            <h4>Edit Barang</h4>
            <div class="col-lg-6 mt-2">
                <form action="/formulir/update/{{ $databackup->id }}" method="POST">
                    @method('put')
                      @csrf
                      <div class="mb-3">
                          <label for="kode" class="form-label">Kode Barang</label>
                        <select name="barang_id" id="barang_id2" class="form-control @error ('barang_id') is-invalid @enderror" onchange="pilih_barang2()">
                          <option value="">-- Pilih Barang --</option>
                          @foreach($barang as $data)
                          @if (old('barang_id', $databackup->barang_id) == $data->id)
                          <option value="{{ $data->id }}" selected>{{ $data->kode }} -- {{ $data->nama }}</option>
                          @else
                          <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option>    
                          @endif
                          {{-- <option value="{{ $data->id }}">{{ $data->kode }} -- {{ $data->nama }}</option> --}}
                          @endforeach
                        </select>  
                         @error('barang_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang2" name="namabarang" value="{{ $databackup->barangs->nama }}" onclick="pilih_barang2()" readonly>
                      </div>                    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Quantity</label>
                        <input type="text" class="form-control @error ('qty') is-invalid @enderror" id="qty2" name="qty" oninput="harga_total2()" value="{{ $databackup->qty }}">
                        @error('qty')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Bandrol</label>
                        <input type="text" class="form-control @error ('harga_bandrol') is-invalid @enderror" id="hargabandrol2" name="harga_bandrol" value="{{ $databackup->harga_bandrol }}" readonly>
                        @error('harga_bandrol')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                         
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (%)</label>
                        <input type="text" class="form-control @error ('diskon_pct') is-invalid @enderror" id="diskon_pct2" oninput="harga_total2()" name="diskon_pct" value="{{ $databackup->diskon_pct }}">
                        @error('diskon_pct')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Diskon (Rp)</label>
                        <input type="text" class="form-control @error ('diskon_nilai') is-invalid @enderror" id="diskon_rp2" name="diskon_nilai" value="{{ $databackup->diskon_nilai }}" readonly>
                        @error('diskon_nilai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>    
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga Diskon</label>
                        <input type="text" class="form-control @error ('harga_diskon') is-invalid @enderror" id="hrgdiskon2" name="harga_diskon" value="{{ $databackup->harga_diskon }}" readonly>
                        @error('harga_diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>    
                      <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control @error ('total') is-invalid @enderror" id="total2" name="total" value="{{ $databackup->total }}" readonly>
                        @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
                          <td class="text-end"><input type="text" name="subtotal" id="subtotal2" class="form-control @error ('subtotal') is-invalid @enderror text-end" style="height: 30px" value="{{ $databackup->subtotal }}" readonly>
                            @error('subtotal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </td>
                        </tr>
                        <tr>
                          <th class="text-start">Diskon</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="diskon" id="diskon2" oninput="bayar2()" class="form-control @error ('diskon') is-invalid @enderror text-end" style="height: 30px" value="{{ $databackup->diskon }}">
                            @error('diskon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </td>
                        </tr>
                        <tr>
                          <th class="text-start">Ongkir</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="ongkir" id="ongkir2" value="{{ $databackup->ongkir }}" oninput="bayar2()" class="form-control @error ('ongkir') is-invalid @enderror text-end" style="height: 30px">
                            @error('ongkir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </td>
                        </tr>
                        <tr>
                          <th class="text-start">Total Bayar</th>
                          <td>&nbsp : &nbsp</td>
                          <td class="text-end"><input type="text" name="total_bayar" id="total_bayar2" value="{{ $databackup->total_bayar }}" class="form-control @error ('total_bayar') is-invalid @enderror text-end" onmousemove="bayar2()" style="height: 30px" readonly>
                            @error('total_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </td>                
                        </tr>
                      </table>
                      <button type="submit" class="btn btn-primary mt-2" id="submit">Simpan</button>
                      <a href="/formulir" class="btn btn-warning mt-2">Kembali</a>
                    </div>
                  </div>
                
                </form> 
            </div>
        </div>
    </div>
</section>

<script>

     $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

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

           function bayar2(){
            var diskon = document.getElementById("diskon2").value;
            var ongkir = document.getElementById("ongkir2").value;
            var subtotal = document.getElementById("subtotal2").value;
            var totalbayar = parseInt(subtotal) - parseInt(diskon) + parseInt(ongkir);

            if(!isNaN(totalbayar)){
              document.getElementById("total_bayar2").value=totalbayar;
            }

          }

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

</script>
    
@endsection