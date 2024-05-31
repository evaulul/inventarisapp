@extends('administrator.index')
@section('konten')

<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="/pegawai"></a></li>
           <li class="breadcrumb-item active">Edit</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <div class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h2 class="card-title">Edit Data Pegawai</h2><br>
              <table id="example1" class="table table-bordered table-striped">
                @foreach ($pegawais as $d)
            <form action="/pegawai/update" method="POST" class="form-horizontal">
              @csrf
              @method('POST')
              <input type="hidden" name="idpegawai" value="{{ $d->idpegawai }}">
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama Pegawai</label>
                      <div class="col-sm-10">
                        <input type="text" name="namapegawai" class="form-control" placeholder="Nama Pegawai" value="{{ $d->namapegawai }}">                    
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">NIP</label>
                          <div class="col-sm-10">
                            <input type="number" name="nip" class="form-control" placeholder="nip" value="{{ $d->nip }}">
                          </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="control-label col-sm-2">Alamat</label>
                      <div class="col-sm-10">
                          <input type="text" name="alamat" class="form-control" placeholder="alamat" value="{{ $d->alamat }}">
                      </div>
                  </div>
                  @endforeach
                  <div class="d-grid gap-2 d-md-block">
                      <input class="btn" style="background-color:rgb(126, 133, 149);" type="submit" name="submit" value="Simpan">
                      <button class="btn btn-secondary" name="reset" type="reset">RESET</button>
                  </div>
              </div>
          </form>
        </table>
                
            </div>
            <!-- /.card-header -->
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection