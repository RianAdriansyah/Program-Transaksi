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
                        <input type="text" class="form-control" id="" name="kode">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="" name="nama">
                      </div>                
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="" name="telp">
                      </div>    
                      <button type="submit" class="btn btn-primary">Simpan</button>            
                    </form>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                   <h5 class="my-4">Daftar Transaksi</h5>
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
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
              </div>
          </div>

      </div>
  </section>

  @endsection