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
           <li class="breadcrumb-item"><a href="/petugas"></a></li>
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
              <h2 class="card-title">Edit Data Petugas</h2><br>
              <table id="example1" class="table table-bordered table-striped">
                @foreach ($petugas as $d)
            <form action="/petugas/update" method="POST" class="form-horizontal">
              @csrf
              @method('POST')
              <input type="hidden" name="id" value="{{ $d->id }}">
              <div class="card-body">
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Nama Petugas</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Petugas" value="{{ $d->nama }}">                    
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" placeholder="username" value="{{ $d->username }}">
                          </div>
                  </div>
                  <div class="mb-3 row">
                      <label  class="control-label col-sm-2">Password</label>
                      <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="password" value="{{ $d->password }}">
                      </div>
                  </div>

                  <select name="role_id" class="form-control" id="">
                    <option value="">-- LEVEL --</option>
                    @foreach ($detail_level as $item)
                    <option value="{{ $item['id'] }}">{{ $item['role_name'] }}</option>
                    @endforeach
                    </select>

                  <div class="d-grid gap-2 d-md-block">
                      <input class="btn" style="background-color:rgb(126, 133, 149);" type="submit" name="submit" value="Simpan">
                      <button class="btn btn-secondary" name="reset" type="reset">RESET</button>
                  </div>
              </div>
          </form>
          @endforeach
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