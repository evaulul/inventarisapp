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
           <li class="breadcrumb-item"><a href="/ruang"></a></li>
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
              <h2 class="card-title">Edit Data ruang</h2><br>
              <table id="example1" class="table table-bordered table-striped">
            <form action="/ruang/update" method="POST" class="form-horizontal">
              @csrf
              @method('POST')
              <input type="hidden" name="idruang" value="{{ $data->idruang}}">
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama ruang</label>
                      <div class="col-sm-10">
                        <input type="text" name="namaruang" class="form-control" placeholder="Nama ruang" value="{{ $data->namaruang }}">                    
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Kode ruang</label>
                          <div class="col-sm-10">
                            <input type="text" name="koderuang" class="form-control" placeholder="koderuang" value="{{ $data->koderuang }}">
                          </div>
                  </div>
                  <div class="mb-3 row">
                      <label class="control-label col-sm-2">Keterangan</label>
                      <div class="col-sm-10">
                          <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="{{ $data->keterangan}}">
                      </div>
                  </div>
                  
                   
                  
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