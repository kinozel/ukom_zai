@extends('layout.layout')
@section('title','Manajemen Pemasukan')
@section('content')
<div class="container" style="margin-left: -200px; margin-top:100px; width: 100vw;">
    <div class="row justify-content-center ">
        <div class="col-md">
            <a class="btn btn-primary me-1" href="{{url('/dashboard')}}">
                Kembali</a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#tambahmasuk-modal">Tambah</button>

            {{-- modaltambah --}}
            <div class="modal fade" id="tambahmasuk-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasukan</h1>
                        </div>
                        <div class="modal-body">
                            <form id="tambahmasuk-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    {{-- @auth
                                       <input type="hidden" name="id_user" class="d-none"
                                              value="{{ Auth::user()["id"] }}">
                                    @endauth --}}
                                    <label>Jenis Pemasukan</label>
                                    <select name="id_jenis_pemasukan" id="jenisSurat" class="form-select mb-3">
                                        <option selected value="">Pilih jenis surat</option>
                                        @foreach($jenis_pemasukan as $jpm)
                                            <option value="{{$jpm->id}}">{{$jpm->jenis_pemasukan}}</option>
                                        @endforeach
                                    </select>
                                    <label>Jumlah Pemasukan</label>
                                    <input type="number" name="jumlah_pemasukan" id="jumlahMasuk"
                                        class="form-control mb-3">
                                    <label>Tanggal Pemasukan</label>
                                    <input type="datetime-local" name="tanggal_pemasukan" id="tanggalMasuk"
                                        class="form-control mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control mb-3" rows="7"
                                        placeholder="Isi Ringkasan" style="resize: none"></textarea>
                                    <label class="d-block"></label>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-3">
                                            {{-- <label for="fileUpload"
                                                  class="btn p-1 w-100 btn-outline-success form-control">Upload</label>
                                           <input type="file" accept=".pdf" name="file" id="fileUpload" class="d-none"> --}}
                                        </div>
                                    </div>
                                    @csrf
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="clearText()"
                                data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" form="tambahmasuk-form">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable" style="width: 72vw">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jenis Pemasukkan</th>
                                <th>Jumlah Pemasukkan</th>
                                <th>Tanggal Pemasukkan</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $no = 1;
                        ?>
                            @foreach($pemasukan as $pmsk)
                            <tr idPemasukan="{{$pmsk->id}}">
                                <td class="col-1">{{$no++}}</td>
                                @empty($pmsk->jenis->jenis_pemasukan)
                                    <td>Pemasukan kosong</td>
                                @endempty
                                <td class="col-1">{{$pmsk->jenis->jenis_pemasukan}}</td>
                                <td class="col-2">{{$pmsk->jumlah_pemasukan}}</td>
                                <td class="col-1">{{$pmsk->tanggal_pemasukan}}</td>
                                <td class="col-4">{{$pmsk->deskripsi}}</td>
                                <td col-2>
                                    <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{$pmsk->id}}" idPemasukan="{{$pmsk->id}}">
                                        Edit
                                    </button>
                                    <button class="hapusBtn btn btn-danger">Hapus</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-modal-{{$pmsk->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Surat</h1>
                                       </div>
                                       <div class="modal-body">
                                           <form id="edit-pemasukan-form-{{$pmsk->id}}" enctype="multipart/form-data">
                                               <div class="form-group">
                                                   {{-- @auth
                                                       <input type="hidden" name="id_user" class="d-none"
                                                              value="{{ Auth::user()["id"] }}">
                                                   @endauth --}}
                                                   <label>Jenis Pemasukan</label>
                                                   <select name="id_jenis_pemasukan" id="jenisPemasukan"
                                                           class="form-select mb-3">
                                                       @foreach($jenis_pemasukan as $jpm)
                                                           <option value="{{$jpm->id}}"
                                                                   @if($jpm->id === $pmsk->id_jenis_pemasukan) selected
                                                               @endif>{{$jpm->jenis_pemasukan}}</option>
                                                       @endforeach
                                                   </select>
                                                   <label>Tanggal Pemasukan</label>
                                                   <input type="datetime-local" name="tanggal_pemasukan" id="tanggalPemasukan"
                                                          class="form-control mb-3"
                                                          value="{{$pmsk->tanggal_pemasukan}}">
                                                          <label>Jumlah Pemasukan</label>
                                                     <input type="number" name="jumlah_pemasukan" id="jumlahMasuk"
                                                              class="form-control mb-3" value="{{$pmsk->jumlah_pemasukan}}">
                                                   <label>Deskripsi</label>
                                                   <textarea name="deskripsi" class="form-control mb-3" rows="7"
                                                             placeholder="Tulis ringkasan surat disini..."
                                                             style="resize: none">{{$pmsk->deskripsi}}</textarea>
                                                   <div class="row d-flex align-items-center">
                                                   </div>
                                                   @csrf
                                               </div>
                                           </form>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" onclick="clearText()"
                                                   data-bs-dismiss="modal">
                                               Cancel
                                           </button>
                                           <button type="submit" class="btn btn-primary edit-btn"
                                                   form=
                                                   "edit-pemasukan-form-{{$pmsk->id}}">
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
    @endsection
    @section('footer')
    <script type="module">
        $('.table').DataTable();
    $('#tambahmasuk-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            console.log(Object.fromEntries(data))
            axios.post('/pemasukan/tambah', data, {
                'Content-Type': 'multipart/form-data'
            })
                .then(() => {
                    $('#tambahmasuk-modal').css('display', 'none')
                    swal.fire('Berhasil tambah data!', '', 'success').then(function () {
                        location.reload();
                    })
                })
                .catch(({response}) => {
                    swal.fire('Gagal tambah data!', `<strong class="text-danger">${response.data.message}</strong>`,
                        'warning');
                });
        })

        //hapus
        $('.table').on('click', '.hapusBtn', function () {
            let idPemasukan = $(this).closest('tr').attr('idPemasukan');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete(`/pemasukan/${idPemasukan}/hapus`)
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
                        }).catch(function () {
                        swal.fire('Data gagal di hapus!', '', 'error').then(function () {
                            //Refresh Halaman
                            location.reload();
                        });
                    });
                }
            });
        })


        ///edit
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idPemasukan = $(this).attr('idPemasukan');
            $(`#edit-pemasukan-form-${idPemasukan}`).on('submit', function (e) {
                e.preventDefault();
                let data = new FormData(this);
                // console.log(Object.fromEntries(data));
                axios.post(`/pemasukan/${idPemasukan}/edit`, data)
                    .then(() => {
                        $(`#edit-modal-${idPemasukan}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(({response}) => {
                        // console.log(err)
                        let message = '';

                        Object.values(response.data.errors).flat().map((e) =>
                            message += `<strong class="text-danger d-block">${e}</strong>`
                        );

                        swal.fire('Gagal tambah data!', `${message}`, 'warning');
                    })
            })
        })




        // $('.table').on('click', '.hapusBtn', function () {
        //     let idPemasukan = $(this).closest('tr').attr('idPemasukan');
        //     swal.fire({
        //         title: "Apakah anda ingin menghapus data ini?",
        //         showCancelButton: true,
        //         confirmButtonText: 'Gas',
        //         cancelButtonText: 'gajadi',
        //         confirmButtonColor: 'red'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             //dilakukan proses hapus
        //             axios.delete(`/pemasukan/${idPemasukan}`)
        //                 .then(function (response) {
        //                     console.log(response);
        //                     if (response.data.success) {
        //                         swal.fire('Berhasil di hapus!', '', 'success').then(function () {
        //                             //Refresh Halaman
        //                             location.reload();
        //                         });
        //                     } else {
        //                         swal.fire('Gagal di hapus!', '', 'warning');
        //                     }
        //                 }).catch(function (error) {
        //                 swal.fire('Data gagal di hapus!', '', 'error').then(function () {
        //                     //Refresh Halaman
        //                     location.reload();
        //                 });
        //             });
        //         }
        //     });
        // })

</script>
    @endsection
