@extends('layout.layout')
@section('title','Manajemen User ')
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
                           <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                       </div>
                       <div class="modal-body">
                        <form id="tambah-user-form">
                            <div class="form-group">
                                <label>Username</label>
                                <input placeholder="Username" type="text" class="form-control mb-3"
                                       name="username"
                                       required/>
                                       <label>Password</label>
                                <input placeholder="Password" type="Password" class="form-control mb-3"
                                       name="password"
                                       required/>
                                       <label>Role</label>
                                       <select name="role" class="form-select mb-3" required>
                                        <option selected value="jamaah">jamaah</option>
                                        <option value="dkm">dkm</option>
                                        <option value="superadmin">superadmin</option>
                                    </select>
                                @csrf
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" form="tambah-user-form">Tambah</button>
                    </div>
                   </div>
               </div>
           </div>     
           <div class="card mt-2" style="width:75vw">
            <div class="card-body" style="width: 75vw">
                <table class="table table-bordered table-hovered DataTable" style="width: 72vw">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $jpl)
                        <tr idJS="{{$jpl->username}}">
                            <td class="col-1">{{$jpl->username}}</td>
                            <td>{{$jpl->password}}</td>
                            <td>{{$jpl->role}}</td>

                            <td class="col-2">
                                <!-- Button trigger edit modal -->
                                <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{$jpl->username}}" idJS="{{$jpl->username}}">
                                    Edit
                                </button>
                                <button class="hapusBtn btn btn-danger text-white">Hapus</button>
                            </td>
                        </tr>

                      <div class="modal fade" id="edit-modal-{{$jpl->username}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                    </div>
                                    <div class="modal-body">
                                    <form id="edit-jpl-form-{{$jpl->username}}">
    <div class="form-group">
        <label>Username</label>
        <input placeholder="Username" type="text" class="form-control mb-3"
               name="username"
               value="{{$jpl->username}}"
               required/>
        <label>Password</label>
        <input placeholder="Password" type="password" class="form-control mb-3"
               name="password"
               value="{{$jpl->password}}"
               required/>
        <label>Role</label>
        <select name="role" class="form-select mb-3" required>
            @foreach(['jamaah', 'dkm', 'superadmin'] as $role)
                <option value="{{$role}}" {{ $jpl->role == $role ? 'selected' : '' }}>{{$role}}</option>
            @endforeach
        </select>
        @csrf
    </div>
</form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <button type="submit" class="btn btn-warning edit-btn"
                                                form="edit-jpl-form-{{$jpl->username}}">
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
    $('#tambah-user-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            axios.post('/user/tambah', Object.fromEntries(data))
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
                    axios.delete(`/user/${idJS}/hapus`)
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
                axios.post(`/user/${idJS}/edit`, data)
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