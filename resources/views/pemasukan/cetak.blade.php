@section('title', 'Cetak Data Pemasukan')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('mosque2.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"> Tambahkan Bootstrap CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">


    <style>
        * {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="form-group mt-5">
        <h3 class="text-white" align="center"><b>Laporan Pemasukan Masjid</b></h3>
        <table class="table table-bordered table-hovered DataTable mt-3" style="width: 72vw; margin-left: 14%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jenis Pemasukan</th>
                    <th>Jumlah Pemasukan</th>
                    <th>Tanggal Pemasukan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($pemasukan as $pmsk)
                    <tr idPemasukan="{{ $pmsk->id }}">
                        <td class="col-1">{{ $no++ }}</td>
                        <td class="col-1">{{ $pmsk->jenis_pemasukan->jenis_pemasukan }}</td>
                        <td class="col-2">{{ $pmsk->jumlah_pemasukan }}</td>
                        <td class="col-1">{{ $pmsk->tanggal_pemasukan }}</td>
                        <td class="col-2">{{ $pmsk->deskripsi }}</td>

    </div>
    </div>
    @endforeach
    </tbody>
    </table>

    @yield('footer')
    <script>
        window.print();
    </script>
</body>

</html>