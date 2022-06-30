@extends('layouts.main')    

  @section('content')
  
  <section class="customer">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mt-4">
                    <form action="customer" method="POST">
                        {{ csrf_field() }}
                      <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control @error ('kode') is-invalid @enderror" id="" name="kode" value="{{ old('kode') }}">
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
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control @error ('telp') is-invalid @enderror" id="" name="telp" value="{{ old('telp') }}">
                         @error('telp')
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
                   <h5 class="my-4">Daftar Customer</h5>

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
                <th>Telepon</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $list)
              <tr>
                <td>{{ $loop->iteration++ }}</td>
                <td>{{ $list->kode }}</td>
                <td>{{ $list->nama }}</td>
                <td>+62{{ $list->telp }}</td>
                <td class="text-center">
                     <button type="button" class="btn btn-sm btn-success" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editcustomer"
                            data-id_cust="{{ $list->id }}"
                            data-mykode="{{ $list->kode }}"
                            data-mynama="{{ $list->nama }}"
                            data-mytelp="{{ $list->telp }}"><i class="bi bi-pencil-square"></i></button>
                    <form action="/customer/{{ $list->id }}" method="POST" class="d-inline border-0">
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
      <div class="modal fade" id="editcustomer" tabindex="-1" aria-labelledby="ubahcust" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ubah Data Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-8 mt-4">
                    <form action="{{ route('customer.update', 'edit') }}" method="POST">
                      @method('patch')
                        {{ csrf_field() }}
                    <input type="hidden" name="id_customer" id="id_cust" value="">
                      <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                      </div>                
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp">
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
          $('#editcustomer').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget);
            var kode = button.data('mykode');
            var nama = button.data('mynama');
            var telp = button.data('mytelp');
            var id_cust = button.data('id_cust');

            var modal = $(this)
            modal.find('#kode').val(kode);
            modal.find('#nama').val(nama);
            modal.find('#telp').val(telp);
            modal.find('#id_cust').val(id_cust);
          })
      </script>

  @endsection