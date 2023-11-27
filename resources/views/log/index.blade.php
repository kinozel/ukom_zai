@extends('layout.layout')
@section('title', 'Log Activity')
@section('content')

<div class="row justify-content-center container" style="margin-left: -200px">
    <div class="col-md">
    <a class="btn btn-primary mb-2" href="{{url('/dashboard')}}">
                Kembali</a>
            
        <div class="card mb-4" style="width: 75vw">
            <div class="card-body">
                <!-- Table log pertama -->
                <h1>pemasukan</h1>
                <table class="table table-bordered table-hovered DataTable" style="width: 72vw;">
                    <!-- Kode thead dan tbody log pertama -->
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Action</th>
                            <th>Log</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($logs as $log)
                        @php
                        $type = "";
                        switch($log->action) {
                        case "UPDATE":
                        $type = "warning";
                        break;
                        case "INSERT":
                        $type = "success";
                        break;
                        case "DELETE":
                        $type = "danger";
                        break;
                        }
                        @endphp
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">
                                <div @class(["d-flex", "justify-content-center" , "badge" , "text-center"
                                    , "text-bg-$type" , "p-2" ])>{{$log->action}}</div>
                            </td>
                            {{-- <td>{{$log->jumlah_pemasukan}}</td> --}}
                            <td>{{$log->log}}</td>
                            <td class="col-2">{{$log->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-4" style="width: 75vw">
            <div class="card-body">

                <h1>pengeluaran</h1>
                <!-- Table log ke 2 -->
                <table class="table table-bordered table-hovered DataTable" style="width: 72vw;">
                    <!-- Kode thead dan tbody log ke 2 -->
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Action</th>
                            <th>Log</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($logs_pengeluaran as $log_pengeluaran)
                        @php
                        $type = "";
                        switch($log_pengeluaran->action) {
                        case "UPDATE":
                        $type = "warning";
                        break;
                        case "INSERT":
                        $type = "success";
                        break;
                        case "DELETE":
                        $type = "danger";
                        break;
                        }
                        @endphp
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">
                                <div @class(["d-flex", "justify-content-center" , "badge" , "text-center"
                                    , "text-bg-$type" , "p-2" ])>{{$log_pengeluaran->action}}</div>
                            </td>
                            {{-- <td>{{$log_pengeluaran->jumlah_pengeluaran}}</td> --}}
                            <td>{{$log_pengeluaran->log}}</td>
                            <td class="col-2">{{$log_pengeluaran->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card mb-4" style="width: 75vw">
            <div class="card-body">

                <h1>user</h1>
                <!-- Table log ke 2 -->
                <table class="table table-bordered table-hovered DataTable" style="width: 72vw;">
                    <!-- Kode thead dan tbody log ke 2 -->
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Action</th>
                            <th>Log</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                        @foreach($logs_user as $log_user)
                        @php
                        $type = "";
                        switch($log_user->action) {
                        case "UPDATE":
                        $type = "warning";
                        break;
                        case "INSERT":
                        $type = "success";
                        break;
                        case "DELETE":
                        $type = "danger";
                        break;
                        }
                        @endphp
                        <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td class="text-center">
                                <div @class(["d-flex", "justify-content-center" , "badge" , "text-center"
                                    , "text-bg-$type" , "p-2" ])>{{$log_user->action}}</div>
                            </td>
                            {{-- <td>{{$log_user->role}}</td> --}}
                            <td>{{$log_user->log}}</td>
                            <td class="col-2">{{$log_user->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script type="module">
    $('.table').DataTable();
    </script>
@endsection
