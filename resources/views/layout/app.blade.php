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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"> <!-- Tambahkan Bootstrap CSS --> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #008870;
            font-family: Fredoka;
        }

      

    </style>
</head>

<body>

            
            

@yield('content')


@yield('footer')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
            $(this).remove();
        });
    }, 3000);
</script>
</body>
</html>