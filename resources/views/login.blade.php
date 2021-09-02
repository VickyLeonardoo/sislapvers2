
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/login') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/style.css">
    <link rel="icon" href="{{ asset('assets/login') }}/images/poltek.png">
    <title>SILP</title>
  </head>
  <body>
  

    
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('assets/login') }}/images/poltek.png" alt="Image" class="img-fluid">
          <span><b>SILP</b></span> adalah Sistem Lapor Polibatam yang merupakan Website untuk menampung pengaduan serta aspirasi terhadap internal ataupun eksternal Polibatam.Program ini bertujuan untuk menningkatkan mutu layanan yang ada pada <span>POLIBATAM</span>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                @if (session('pesan'))
              <div class="alert alert-danger alert-dismissible">
                  <h4><i class="icon fa fa-times"></i>Gagal</h4>
                    <span aria-hidden="true">&times;</span></button>
                  {{ session('pesan') }}
              </div>@elseif(session('berhasil'))
              <div class="alert alert-success alert-dismissible">
                  <h4><i class="icon fa fa-check"></i>Berhasil</h4>
                  {{ session('berhasil') }}
              </div>
              @endif
              <h3>LOGIN</h3>
              <p class="mb-4"></p>
            </div>
            <form action="{{url('proses_login')}}" method="POST" id="logForm">
              @csrf
              <div class="form-group first">
                <input
                class="form-control py-4"
                id="inputEmailAddress"
                name="username"
                autocomplete="off"
                type="text"
                placeholder="Username"/>
                @if($errors->has('username'))
                <span class="error">{{ $errors->first('username') }}</span>
                @endif

              </div>
              <div class="form-group last mb-4">
                <input
                class="form-control py-4"
                id="inputPassword"
                type="password"
                name="password"
                placeholder="Password"/>
                @if($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif
              </div>
              
              <input type="submit" value="Log In" class="btn btn-block btn-info">
              <span class="d-block text-left my-4 text-muted">&mdash; Belum Punya Akun?&mdash;</span>
              <span class="ml-auto"><a href="/register" class="forgot-pass">Daftar</a></span> 
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>