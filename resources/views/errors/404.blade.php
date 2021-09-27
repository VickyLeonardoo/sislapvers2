<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Error</title>
<link rel="stylesheet" type="text/css" href="{{ asset('404') }}/style.css">
</head>
<body>
    <div id="container">
        <div class="content">
            <h2>404</h2>
            <h4>Opps! Halaman Tidak Ditemukan</h4>
            <p>Halaman yang kamu cari tidak ada,mungkin kamu masuk ke alamat website yang salah</p>
        </div>
    </div>
    <script type="text/javascript">
        var container = document.getElementById('container');
        window.onmousemove = function(e){
            var x = - e.clientX/5,
                y = - e.clientY/5;
            container.style.backgroundPositionX = x + 'px';
            container.style.backgroundPositionY = y + 'px';
        }
    </script>
</body>
</html>