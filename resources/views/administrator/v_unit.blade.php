@extends('administrator.template.header')
@section('content')
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Petugas</th>
                    <th>NIK</th>
                    <th>Username</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($admin as $data)
                        <tr>
                          <td>{{ $data->id_petugas }}</td>
                          <td>{{ $data->nik }}</td>
                          <td>{{ $data->username }}</td>
                          <td>{{ $data->nama_div }}</td>
                          <td>
                            {{-- <!-- Button trigger modal --> --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id_petugas }}">
                              Detail
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passwordModal{{ $data->id_petugas }}">
                              <i class="fas fa-eye"></i>
                              Ganti Password
                            </button>
                          </td>
                          
                        </tr>
                    @endforeach
                    

                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
    
    @foreach ($admin as $data)
    <div class="modal fade" id="exampleModal{{ $data->id_petugas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NO Pengaduan : {{ $data->id_petugas }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" action="/laporan/update/">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" value="{{ $data->nik }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" value="{{ $data->nama }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" value="{{ $data->username }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" value="{{ $data->email }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $data->nama_div }}">
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
    <!-- Modal -->
    @foreach ($admin as $data)
    <div class="modal fade" id="passwordModal{{ $data->id_petugas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">NO Pengaduan : {{ $data->id_petugas }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" action="/laporan/update/password/{{ $data->id_petugas }}">
                @csrf
                    <!-- text input -->
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Password Confirmation</label>
                      <input type="text" class="form-control">
                    </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Simpan">
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
