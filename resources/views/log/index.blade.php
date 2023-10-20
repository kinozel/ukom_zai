@extends('layout.layout')
@section('title', 'Log Activity')
@section('content')
    <div class="row">
        <
    </div>
    <div class="row justify-content-center" style="margin-left: -200px">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable" style="width: 72vw;">
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
                                    <div @class(["d-flex", "justify-content-center", "badge", "text-center", "text-bg-$type", "p-2"])>{{$log->action}}</div>
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

        </div>
    </div>
@endsection
@section('footer')
    <script type="module">
        $('.table').DataTable();
    </script>
@endsection
