@extends('layouts.main')    

  @section('content')
  
  <section class="barang">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mt-4">
                    <form action="barang" method="POST">
                        {{ csrf_field() }}
                      <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control @error ('kode') is-invalid @enderror" id="tambahkode" name="kode" value="{{ old('kode') }}">
                         @error('kode')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>                
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga</label>
                        <input type="text" class="form-control @error ('harga') is-invalid @enderror" id="" name="harga" value="{{ old('harga') }}">
                        @error('harga')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>    
                      <button type="submit" class="btn btn-primary">Simpan</button>            
                    </form>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                <h5 class="my-4">Daftar Transaksi</h5>
                
                {{-- ALERT --}}
                @if (session()->has('success'))
                  <div class="alert alert-success col-lg-12" role="alert">
                      {{ session('success') }}
                  </div>
                @endif

                  <table class="table" id="datatables">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                      <tr>
                        <td>{{ $loop->iteration++ }}</td>
                        <td>{{ $list->kode }}</td>
                        <td>{{ $list->nama }}</td>
                        <td>{{ $list->harga }}</td>
                        <td class="text-center">
                            {{-- <a href="" id="editdata" data-bs-toggle="modal" data-bs-target="#ubahbarang" class="btn btn-sm btn-primary">Edit</a> --}}

                            <button type="button" class="btn btn-sm btn-success" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modaledit"
                            data-id_brg="{{ $list->id }}"
                            data-mykode="{{ $list->kode }}"
                            data-mynama="{{ $list->nama }}"
                            data-myharga="{{ $list->harga }}"><i class="bi bi-pencil-square"></i></button>

                            <form action="/barang/{{ $list->id }}" method="POST" class="d-inline border-0">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu yakin?')"><i class="bi bi-trash"></i></button>
                            </form>                        
                        </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>

      
      <!-- Modal -->
      <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="ubahbarangLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ubahbarangLabel">Ubah Data Barang</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-8 mt-4">
                    <form action="{{ route('barang.update', 'edit') }}" method="POST">
                      @method('patch')
                        {{ csrf_field() }}
                    <input type="hidden" name="id_barang" id="id_brg" value="">
                      <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="">
                      </div>                
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="">
                      </div>    
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" id="submit">Update</button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <script>
        $('#modaledit').on('show.bs.modal', function (event){
          var button = $(event.relatedTarget)
          var kode = button.data('mykode');
          var nama = button.data('mynama');
          var harga = button.data('myharga');
          var id_brg = button.data('id_brg');

          var modal = $(this)
          modal.find('#kode').val(kode);
          modal.find('#nama').val(nama);
          modal.find('#harga').val(harga);
          modal.find('#id_brg').val(id_brg);
        })
</script>


  @endsection