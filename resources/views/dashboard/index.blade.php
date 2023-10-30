@extends('layout.layout')
@section('title','Dashboard')
@section('content')


<div class="container" >
    <div class="row" style="margin-left:-50px;">
        <div class="col-3">
            <a href="{{url('/jenis_pemasukan')}}" class="text-decoration-none">
                <div class="card bg-c-green"
                    style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                class="f-right">{{$jenis_pemasukan}}</span></h1>
                        <h2>Jenis Pemasukan</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3" style="margin-left:40px;">
            <a href="{{url('/jenis_pengeluaran')}}" class="text-decoration-none">
                <div class="card bg-c-green"
                    style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                class="f-right">{{$jenis_pengeluaran}}</span></h1>
                        <h2>Jenis Pengeluaran</h2>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-3" style="margin-left:40px;">
            <a href="{{url('/pemasukan')}}" class="text-decoration-none">
                <div class="card bg-c-green"
                    style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                class="f-right">{{$pemasukan}}</span></h1>
                        <h2>Pemasukan</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3" style="margin-left:120px;">
            <a href="{{url('/pengeluaran')}}" class="text-decoration-none">
                <div class="card bg-c-green"
                    style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                class="f-right">{{$pengeluaran}}</span></h1>
                        <h2>Pengeluaran</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3" style="margin-left:50px;">
            <a href="{{url('/log')}}" class="text-decoration-none">
                <div class="card bg-c-green"
                    style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80);">
                    <div class="card-body text-white">
                        <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                class="f-right">{{$log}}</span></h1>
                        <h2>Log Aktivitas</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>


    <div class="row" style="margin-top:100px; margin-left: -150px">
        <div class="col">
        <div class="card mt-2" style="width:75vw;">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable" style="width: 73vw;">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Pemasukkan</th>
                                <th>Jumlah Pemasukkan</th>
                                <th>Tanggal Pemasukkan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $no = 1;
                        ?>
                            @foreach($pemasukaN as $pmsk)
                            <tr idPemasukan="{{$pmsk->id}}">
                                <td class="col-1">{{$no++}}</td>
                                <td class="col-1">{{$pmsk->jenis->jenis_pemasukan}}</td>
                                <td class="col-2">{{$pmsk->jumlah_pemasukan}}</td>
                                <td class="col-1">{{$pmsk->tanggal_pemasukan}}</td>
                                <td class="col-4">{{$pmsk->deskripsi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>


        <!-- <div class="row" style="margin-right: 10000px; ">
            <div class="card mt-2" style="width:80vw;">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable" style="width: 40vw; height:10vh; ">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Pemasukkan</th>
                                <th>Jumlah Pemasukkan</th>
                                <th>Tanggal Pemasukkan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $no = 1;
                        ?>
                            @foreach($pemasukaN as $pmsk)
                            <tr idPemasukan="{{$pmsk->id}}">
                                <td class="col-1">{{$no++}}</td>
                                <td class="col-1">{{$pmsk->jenis->jenis_pemasukan}}</td>
                                <td class="col-2">{{$pmsk->jumlah_pemasukan}}</td>
                                <td class="col-1">{{$pmsk->tanggal_pemasukan}}</td>
                                <td class="col-4">{{$pmsk->deskripsi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->



</div>


@endsection
