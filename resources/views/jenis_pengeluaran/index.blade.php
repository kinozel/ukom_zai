@extends('layout.layout')
@section('title','Jenis Pengeluaran')
@section('content')
<div class="container" style="margin-left: -200px; margin-top:100px; width: 100vw;">
    <div class="row justify-content-center ">
        <div class="col-md">
            <a class="btn btn-primary me-1" href="{{url('/dashboard')}}">
                Kembali</a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#tambahjeniskeluar-modal">Tambah</button>

                {{-- modaltambah --}}
                <div class="modal fade" id="tambahjeniskeluar-modal" tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Pengeluaran</h1>
                       </div>
                       <div class="modal-body">
                        <form id="tambah-jenis-pengeluaran-form">
                            <div class="form-group">
                                <label>Jenis Pengeluaran</label>
                                <input placeholder="Keperluan" type="text" class="form-control mb-3"
                                       name="jenis_pengeluaran"
                                       required/>
                                @csrf
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" form="tambah-jenis-pengeluaran-form">Tambah</button>
                    </div>
                   </div>
               </div>
           </div>     
           <div class="card mt-2">
            <div class="card-body" style="width: 75vw">
                <table class="table table-bordered table-hovered DataTable" style="width: 72vw">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis Pengeluaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jenis_pengeluaran as $jpl)
                        <tr idJS="{{$jpl->id}}">
                            <td class="col-1">{{$jpl->id}}</td>
                            <td>{{$jpl->jenis_pengeluaran}}</td>
                            <td class="col-2">
                                <!-- Button trigger edit modal -->
                                <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{$jpl->id}}" idJS="{{$jpl->id}}">
                                    Edit
                                </button>
                                <button class="hapusBtn btn btn-danger text-white">Hapus</button>
                            </td>
                        </tr>

                      <div class="modal fade" id="edit-modal-{{$jpl->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jenis Pengeluaran</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit-jpl-form-{{$jpl->id}}">
                                            <div class="form-group">
                                                <label>Jenis Pengeluaran</label>
                                                <input placeholder="example" type="text" class="form-control mb-3"
                                                       name="jenis_pengeluaran"
                                                       value="{{$jpl->jenis_pengeluaran}}"
                                                       required/>
                                                @csrf
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-warning edit-btn"
                                                form="edit-jpl-form-{{$jpl->id}}">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="module">
    $('.table').DataTable();
    $('#tambah-jenis-pengeluaran-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            axios.post('/jenis_pengeluaran/tambah', Object.fromEntries(data))
                .then(() => {
                    $('#tambah-jenis-pengeluaran-modal').css('display', 'none')
                    swal.fire('Berhasil tambah data!', '', 'success').then(function () {
                        location.reload();
                    })
                })
                .catch(({response}) => {
                    swal.fire('Gagal tambah data!', `<strong class="text-danger">${response.data.message}</strong>`,
                        'warning');
                });
        })

        $('.table').on('click', '.hapusBtn', function () {
            let idJS = $(this).closest('tr').attr('idJS');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Gas',
                cancelButtonText: 'gajadi',
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete(`/jenis_pengeluaran/${idJS}/hapus`)
                        .then(function (response) {
                            console.log(response);
                            if (response.data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function () {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            } else {
                                swal.fire('Gagal di hapus!', '', 'warning');
                            }
                        }).catch(function (error) {
                        swal.fire('Data gagal di hapus!', '', 'error').then(function () {
                            //Refresh Halaman
                            location.reload();
                        });
                    });
                }
            });
        })

        $('.editBtn').on('click', function (editBtn) {
            editBtn.preventDefault();
            let idJS = $(this).closest('tr').attr('idJS');
            $(`#edit-jpl-form-${idJS}`).on('submit', function (e) {
                e.preventDefault();
                let data = Object.fromEntries(new FormData(e.target));
                axios.post(`/jenis_pengeluaran/${idJS}/edit`, data)
                    .then(() => {
                        $(`#edit-modal-${idJS}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(({response}) => {
                    swal.fire('Gagal tambah data!', `<strong class="text-danger">${response.data.message}</strong>`,
                        'warning');
                });
            })
        })

</script>
@endsection 