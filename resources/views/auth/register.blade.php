<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body >
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-8">
            <div class="card" style="width: 100%;">
            

                <div class="row g-0">
                    <div class="col-md-6">
                    <img src="bgnewlogin.png" alt="Gambar Card" class="img-fluid">
                        
                      
                    </div>
                    
                    <div class="col-md-6">
                    <div class="card-body">
                            <h5 class="card-title text-center custom-login-text">DAFTAR</h5>
                            <div class="form-group">
                            <label for="username" class="custom-username-label">USERNAME</label>
                            <input type="text" class="form-control custom-text-input" id="username">
                            <label for="nama" class="custom-username-label">NAMA</label>
                            <input type="tedt" class="form-control custom-text-input" id="nama">
                            <label for="password" class="custom-username-label">PASSOWRD</label>
                            <input type="password" class="form-control custom-text-input" id="password">
                            <label for="nomor" class="custom-username-label">NOMOR TELEPON</label>
                            <input type="number" min="11" max="13" class="form-control custom-text-input" id="nomor">
                        </div>
                        <button class="custom-login-button">Daftar</button>
                        <div class="custom-register-text">
                         Sudah punya akun?
                        <span><a href="http://localhost:8000/">Login</a></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
