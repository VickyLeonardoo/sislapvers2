<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('template1') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('template1') }}/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style') }}/style.css">


</head>
<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js"></script>

<body class="box">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h4 class="h4  mb-3">Daftar Akun</h4>

                  </div>
                  @if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i>Sukses</h4>
    {{ session('pesan') }}
  </div>
@endif
                  <form class="user" method="POST" action="/register/save">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nama" autocomplete="off" value="{{ old('nama') }}" class="form-control form-control-user" placeholder="Masukkan Nama">
                        <div class="text-danger" style="text-size: 2px;" >
                            @error('nama')
                                {{ $message }}
                            @enderror
                          </div>
                    </div>
                    <div class="form-group">
                      <input type="text" name="no_hp" autocomplete="off" value="{{ old('no_hp') }}" class="form-control form-control-user" placeholder="Masukkan Nomor HP">
                      <div class="text-danger" style="text-size: 2px;" >
                          @error('no_hp')
                              {{ $message }}
                          @enderror
                        </div>  
                  </div>
                    <div class="form-group">
                      <input type="text" name="username" autocomplete="off" value="{{ old('username') }}" class="form-control form-control-user" placeholder="Masukkan Username">
                      <div class="text-danger" style="text-size: 2px;" >
                          @error('username')
                              {{ $message }}
                          @enderror
                        </div>  
                  </div>
                    <div class="form-group">
                      <input type="text" name="email" autocomplete="off" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Masukkan Email">
                      <div class="text-danger" style="text-size: 2px;" >
                          @error('email')
                              {{ $message }}
                          @enderror
                        </div>  
                  </div>
                      <div class="form-group">
                        <input type="password"  name="password" value="{{ old('password') }}" class="form-control form-control-user" placeholder="Masukkan Password">
                        <div class="text-danger" style="text-size: 2px;" >
                            @error('password')
                                {{ $message }}
                            @enderror
                          </div>  
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_confirmation" value="" class="form-control form-control-user" placeholder="Konfirmasi Password">
                      <div class="text-danger" style="text-size: 2px;" >
                          @error('password')
                              {{ $message }}
                          @enderror
                        </div>  
                    </div>
                      

                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Daftar!">

                    </a>
                    <hr>

                  </form>
                  <div class="text-center">
                    Sudah Punya Akun?
                    <a class="small" href="index.php">Silahkan Login</a>
                  </div>

                  <hr>


                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('template1') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('template1') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('template1') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('template') }}js/sb-admin-2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

  <script>

  </script>

</body>

</html>