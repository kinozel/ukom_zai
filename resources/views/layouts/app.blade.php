<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('mosque2.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="icon" href="{{asset('mosque 2.png')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"> <!-- Tambahkan Bootstrap CSS -->

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #008870;
            font-family: Fredoka;
        }

        .container {
            display: flex;
            min-height: 100vh;
            margin-left: -12px;
        }

        .sidebar {
            background-color: rgba(189, 189, 189, 0.4);
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
            width: 260px;
        }

        .main {
            margin-left: 20px
        }

        .main a span {
            margin-left: 10px;
        }

        .text1 span {
            font-family: Fredoka;
            text-decoration: none;
        }

        .navbar {
            width: 100px;
            color: transparent;
            margin-top: -350px
        }

        .list_content span,
        a {
            text-decoration: none;
            color: #FBAF01;
            cursor: pointer;
        }

        .menu {
            position: absolute;
            left: 280px;
            background-color: rgba(189, 189, 189, 0.4);
            border-radius: 0px 0px 4px 5px;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
        }

        .menu span {
            font-size: 24px;
            font-family: 'Fredoka';
            font-weight: 400;
            word-wrap: break-word;
            margin-left: 20px;
            margin-bottom: 20px;

        }

        .menu a {
            color: rgba(188, 188, 188, 0.79);
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="header-side">
                <div class="logo">
                    <a href="#">
                        <img class="masjid" src="mosque 2.png"
                            style="margin-left: 90px; margin-top:60px; width: 80px; margin-bottom:10px;">
                    </a>
                </div>
                <div class="brand">
                    <h2 style="font-family: Fugaz One; color:white; margin-left:60px;">ADZ-ZIKRU</h2>
                </div>
            </div>
            <div class="main" style="margin-top:30px;color:#BCBCBCC9;"> Menu
                <div class="list-content">
                    <a href="#">
                        <span class="text1" style="color:white; font-size: 15px;">Dashboard</span>
                    </a>
                </div>
                <div class="list-content">
                    <a href="#">
                        <span class="text1" style="color:white; font-size: 15px;">Media</span>
                    </a>
                </div>
                <div class="list-content">
                    <a href="#">
                        <span class="text1 " style="color:white; font-size: 15px;">Pemasukan</span>
                    </a>
                </div>
                <div class="list-content">
                    <a href="#">
                        <span class="text1" style="color: white; font-size: 15px;">Pengeluaran</span>
                    </a>
                </div>

            </div>

            <div class="navbar" style="margin-left:285px; width:84.7vw; height: 13vh; box-shadow: 0px 4px 10px black; background-color: rgba(189, 189, 189, 0.4); border-radius: 0px 0px 0px 15px; ">
                
                <div class="col-3" style="margin-top: 37px; margin-left:30px;">
                        <a href="#"><span style="font-size: 25px;color: #BCBCBCC9;">Home / </span></a>
                        <a href="#"><span style="font-size: 25px;color: white;"> Dashboard</span></a>
                </div style>  
                <div class="col-3">
                <span style="font-size: 15px;color: black; margin-left:500px;"> Halo!</span>

                <h1 class="m-auto mx-2"><img src="" alt=""></h1>

                </div>      
                <div>
                <span style="font-size: 30px;color: #FBAF01; margin-left:-274px;" > Saeful</span>

                </div>      
            </div>
            
            

            <main class="py-4 container">
        @include('layouts.flash-message')
        @yield('content')
    </main>
</div>

@yield('footer')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);
</script>
</body>
</html>
