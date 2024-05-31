@extends('administrator.index')
@section('konten')

<div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="m-b-10">{{ $judul }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title" style="float: left">{{ $judul }}</h2>
          <a href="tambahinventaris" class="btn btn-info " style="float: right">Tambah</a>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Inventaris</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>OPSI</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
              <tr>
                 <th>{{ $loop->iteration  }}</th>
                 <th>{{ $d->nama }}</th>
                 <th>{{ $d->kode_inventaris }}</th>
                 <th>{{ $d->d_keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia' }}</th>                
                 <th>{{ $d->jumlah }}</th>                
                 <th>
                   <a href="editinventaris{{ $d->id_inventaris }}" class="btn btn-warning">Edit</a>
                   <a href="hapusinventaris{{ $d->id_inventaris }}" class="btn btn-danger">Hapus</a>
                 </th>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection