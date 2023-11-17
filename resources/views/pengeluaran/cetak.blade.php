@section('title', 'Cetak Data Pengeluaran')
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
    {{-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"> <!-- Tambahkan Bootstrap CSS --> --}}
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
        <h3 class="text-white" align="center"><b>Laporan Pengeluaran Masjid</b></h3>
        <table class="table table-bordered table-hovered DataTable mt-3" style="width: 72vw; margin-left: 14%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Jenis Pengeluaran</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                @foreach ($pengeluaran as $pgl)
                    <tr idPengeluaran="{{ $pgl->id }}">
                        <td class="col-1">{{ $no++ }}</td>
                        <td class="col-1">{{ $pgl->jenis_pengeluaran->jenis_pengeluaran }}</td>
                        <td class="col-2">{{ $pgl->jumlah_pengeluaran }}</td>
                        <td class="col-1">{{ $pgl->tanggal_pengeluaran }}</td>
                        <td class="col-1">
                            <div class="w-100 d-flex flex-column">
                                <img src="{{ asset('/storage/' . $pgl->dokumentasi_pengeluaran) }}" width="100vw"
                                    alt="">
                            </div>
                        </td>
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
