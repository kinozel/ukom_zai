<!DOCTYPE html>
<html lang="en">
<head>
@section('title', 'Layout')

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

    <!-- w3 css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"> <!-- Tambahkan Bootstrap CSS --> --}}

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            /* margin-top: -5.5%; */
            background-color: #008870;
            font-family: Fredoka;
            height: 100vh   ;
            width: 100vw;
        }

        /* .container1 {
            display: flex;
            min-height: 100vh;
            margin-left: 12px;
        } */

        .sidebar {
            background-color: rgba(189, 189, 189, 0.4);
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
            width: 260px;
        }
        .container {
            width: 100%;
            margin-top: 5%;
        }

        /* .main{
            margin-left: 20px;
        }

        .main a span {
            margin-left: 30px;
        } */

        /* .text1 span {
            font-family: Fredoka;
            text-decoration: none;
        } */

        /* .navbar {
            width: 100px;
            color: transparent;
            margin-top: -350px
        } */

        /* .list_content span,
        a {
            text-decoration: none;
            color: #FBAF01;
            cursor: pointer;
        } */

        /* .menu {
            position: absolute;
            left: 280px;
            background-color: rgba(189, 189, 189, 0.4);
            border-radius: 0px 0px 4px 5px;
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
        } */

        /* .menu span {
            font-size: 24px;
            font-family: 'Fredoka';
            font-weight: 400;
            word-wrap: break-word;
            margin-left: 20px;
            margin-bottom: 20px;

        } */

        .menu a {
            color: rgba(188, 188, 188, 0.79);
            text-decoration: none;
        }

        .sam-sidebar{
            background-color: rgba(189, 189, 189, 0.4);
            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
            text-decoration: none;
            

        }
        .sam-tulisan{
            color: #ffffff;
            font-family: Fugaz One;
            text-decoration: none;
        }

        .sam-navbar{
            border-radius: 0px 0px 0px 10px;
            background-color: rgba(189, 189, 189, 0.4);

            box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.50);
        }
        .sam-btn{
            box-shadow: 0px 4px 3px 5px rgba(0, 0, 0, 0.60); border-radius: 10px
        }

    </style>
</head>
<body>
    

<div class="w3-sidebar w3-bar-block sam-sidebar w3-center" style="width:15%">
<div>
<img style="margin-top:30%; width:30%; height:30%;" src="mosque2.png">
<h3  class="sam-tulisan w3-margin-top">ADZ-ZIKRU</h3>
</div>
<div   ><h5 style="color: rgba(188.06, 188.06, 188.06, 0.79); margin-right:50%; margin-top:15%;">Menu</h5></div>

  <a href="#" class="w3-bar-item sam-tulisan"><h5>Dashboard</h5></a>
  <a href="#" class="w3-bar-item sam-tulisan"><h5>Pemasukan</h5></a>
  <a href="#" class="w3-bar-item sam-tulisan"><h5>Pengeluaran</h5></a>
</div>
<div class="w3-bar w3-right sam-navbar" style="width: 84%; height:10%;">
  <a  class="w3-bar-item sam-tulisan" style="color: rgba(188.06, 188.06, 188.06, 0.79); margin-top:1.5%; margin-left:2%;"><h2>Home</h2></a>
  <a class="w3-bar-item sam-tulisan" style="color: white; margin-top:1.5%; margin-left:-1.5%;"><h2>/ @yield('title')</h2></a>
  <a  class="w3-bar-item btn btn-danger w3-right sam-btn" style="margin-right: 2%; margin-top:1.5%;" href="{{ route('logout')}}">{{ __('Logout') }}</a>

  <span style="color: #FBAF01; margin-top:1.5%;" class="w3-bar-item w3-right" ><h1> {{Auth::user()->username}}</h1></span>
  
  <span  class="w3-bar-item w3-right" style="margin-top:1%; margin-right:-4%;">Halo!</span>

</div>

<main style="margin-left:550px; display:flex;">
        {{-- @include('layouts.flash-message') --}}
             @yield('content')
            </main>

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