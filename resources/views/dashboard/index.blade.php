@extends('layout.layout')
@section('title','Dashboard')
@section('content')




<div class="container" style="margin-left: 60px;">
    <div class="row">
         <div class="">
                <a href="{{url('/jenis_pemasukan')}}" class="text-decoration-none">
            <div class="card bg-c-green" style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80); margin-left: -200px;" >
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                    class="f-right">{{$jenis_pemasukan}}</span></h1>
                            <h2>Jenis Pemasukan</h2>
                        </div>
             </div>
                </a>
        </div>
    </div>
    <div class=""style="margin-left:250px;">
        <a href="{{url('/jenis_pengeluaran')}}" class="text-decoration-none">
    <div class="card bg-c-green" style="width:20vw;background: linear-gradient(45deg,#FFB64D,#ffcb80); margin-left: -200px;" >
                <div class="card-body text-white">
                    <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                            class="f-right">{{$jenis_pengeluaran}}</span></h1>
                    <h2>Jenis Pengeluaran</h2>
                </div>
            </div>
        </a>
    </div>
            <div class=""style="margin-left:250px;">
                <a href="{{url('/pemasukan')}}" class="text-decoration-none">
                    <div class="card bg-c-green" style="background: linear-gradient(45deg,#FFB64D,#ffcb80); margin-left: -200px;" >
                        <div class="card-body text-white">
                            <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                    class="f-right">{{$pemasukan}}</span></h1>
                            <h2>Pemasukan</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class=""style="margin-top:200px; margin-left:-650px">
                    <a href="{{url('/pengeluaran')}}" class="text-decoration-none">
                <div class="card bg-c-green" style="background: linear-gradient(45deg,#FFB64D,#ffcb80); margin-left: -200px;" >
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                        class="f-right">{{$pengeluaran}}</span></h1>
                                <h2>Pengeluaran</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=""style="margin-top:200px; margin-left: 200px">
                    <a href="{{url('/log')}}" class="text-decoration-none">
                <div class="card bg-c-green" style="background: linear-gradient(45deg,#FFB64D,#ffcb80); margin-left: -200px;" >
                            <div class="card-body text-white">
                                <h1 class="text-right"><i class="bi bi-envelope-open-fill"></i><span
                                        class="f-right">{{$log}}</span></h1>
                                <h2>Log</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        <div class="row">
            <div class="col">
                



            </div>
        </div>

            
</div>


@endsection