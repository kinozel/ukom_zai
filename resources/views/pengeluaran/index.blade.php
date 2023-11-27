@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\URL;
@endphp
@extends('layout.layout')
@section('title', 'Data Pengeluaran')
@section('content')
    <div class="container" style="margin-left: -200px; margin-top:100px; width: 100vw;">
        <div class="row justify-content-center ">
            <div class="col-md">
                <a class="btn btn-primary me-1" href="{{ url('/dashboard') }}">
                    Kembali</a>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                    data-bs-target="#tambahkeluar-modal">Tambah</button>
                <a class="btn btn-danger me-1" target="_blank" href="{{ url('/pengeluaran/cetak') }}">
                    Cetak Data</a>
                {{-- <span style="font-size: 30px;color: white; margin-left:500px;">Total</span>    --}}
                {{-- modaltambah --}}
                <div class="modal fade" id="tambahkeluar-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasukan</h1>
                            </div>
                            <div class="modal-body">
                                <form id="tambahkeluar-form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        {{-- @auth
                                       <input type="hidden" name="id_user" class="d-none"
                                              value="{{ Auth::user()["id"] }}">
                                    @endauth --}}
                                        <label>Jenis Pemasukan</label>
                                        <select name="id_jenis_pengeluaran" id="jenisPengeluaran" class="form-select mb-3">
                                            <option selected value="">Pilih jenis pengeluaran</option>
                                            @foreach ($jenis_pengeluaran as $jpl)
                                                <option value="{{ $jpl->id }}">{{ $jpl->jenis_pengeluaran }}</option>
                                            @endforeach
                                        </select>
                                        <label>Jumlah Pengeluaran</label>
                                        <input type="number" min="1000" name="jumlah_pengeluaran" id="jumlahKeluar"
                                            class="form-control mb-3">
                                        <label>Tanggal Pengeluaran</label>
                                        <input type="datetime-local" name="tanggal_pengeluaran" id="tanggalKeluar"
                                            class="form-control mb-3">
                                        <label class="d-block">Dokumentasi Pengeluaran : </label>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-3">
                                                <label for="dokumUpload"
                                                    class="btn p-1 w-100 btn-outline-success form-control">Upload
                                                    Dokumentasi</label>
                                                <input type="file" accept=".png, .jpg, .jpeg"
                                                    name="dokumentasi_pengeluaran" id="dokumUpload" class="d-none">
                                            </div>
                                            <div class="col p-0">
                                                <p class="dokumName m-0 d-inline-block"></p>
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
                                <button type="submit" class="btn btn-primary" form="tambahkeluar-form">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-2">
                    <div class="card-body" style="width: 75vw">
                        <table class="table table-bordered table-hovered DataTable" style="width: 72vw">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Jumlah Pengeluaran</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Dokumentasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($pengeluaran as $pgl)
                                    <tr idPengeluaran="{{ $pgl->id }}">
                                        <td class="col-1">{{ $no++ }}</td>
                                        @empty($pgl->jenis_pengeluaran->jenis_pengeluaran)
                                            <td>Pengeluaran kosong</td>
                                        @endempty
                                        <td class="col-1">{{ $pgl->jenis_pengeluaran->jenis_pengeluaran }}</td>
                                        <td class="col-2">{{ $pgl->jumlah_pengeluaran }}</td>
                                        <td class="col-1">{{ $pgl->tanggal_pengeluaran }}</td>
                                        <td class="col-1">
                                            <div class="w-100 d-flex flex-column">
                                                <img src="{{ asset('/storage/' . $pgl->dokumentasi_pengeluaran) }}"
                                                    width="100vw" alt="">
                                            </div>
                                        </td>
                                        <td col-2>
                                            <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit-modal-{{ $pgl->id }}"
                                                idPengeluaran="{{ $pgl->id }}">
                                                Edit
                                            </button>
                                            <button class="hapusBtn btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit-modal-{{ $pgl->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">EditPengeluaran</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="edit-pengeluaran-form-{{ $pgl->id }}"
                                                        enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            {{-- @auth
                                                       <input type="hidden" name="id_user" class="d-none"
                                                              value="{{ Auth::user()["id"] }}">
                                                   @endauth --}}
                                                            <label>Jenis Pemasukan</label>
                                                            <select name="id_jenis_pengeluaran" id="jenisPengeluaran"
                                                                class="form-select mb-3">
                                                                @foreach ($jenis_pengeluaran as $jpm)
                                                                    <option value="{{ $jpm->id }}"
                                                                        @if ($jpm->id === $pgl->id_jenis_pengeluaran) selected @endif>
                                                                        {{ $jpm->jenis_pengeluaran }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label>Tanggal Pengeluaran</label>
                                                            <input type="datetime-local" name="tanggal_pengeluaran"
                                                                id="tanggalPengeluaran" class="form-control mb-3"
                                                                value="{{ $pgl->tanggal_pengeluaran }}">
                                                            <label>Jumlah Pengeluaran</label>
                                                            <input type="number" min="1000"
                                                                name="jumlah_pengeluaran" id="jumlahKeluar"
                                                                class="form-control mb-3"
                                                                value="{{ $pgl->jumlah_pengeluaran }}">
                                                            <label class="d-block">Dokumentasi Pengeluaran : </label>
                                                            <div class="row d-flex align-items-center">
                                                                <div class="col-3">
                                                                    <label for="dokumUpload"
                                                                        class="btn p-1 w-100 btn-outline-success form-control">Upload
                                                                        Dokumentasi</label>
                                                                    <input type="file" accept=".png, .jpg, .jpeg"
                                                                        name="dokumentasi_pengeluaran" id="dokumUpload"
                                                                        class="d-none">
                                                                </div>
                                                                <div class="col p-0">
                                                                    <p class="dokumName m-0 d-inline-block"></p>
                                                                </div>
                                                            </div>

                                                            @csrf
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        onclick="clearText()" data-bs-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary edit-btn"
                                                        form=
                                                   "edit-pengeluaran-form-{{ $pgl->id }}">
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
        <script>
            function clearText() {
                $(`.dokumName`).text('');
                $('#dokumUpload').val('');
            }
        </script>
        <script type="module">
            $('.table').DataTable();
            $('input[type=file]').on('change', function() {
                const fileName = $(this).val().replace(/.*(\/|\\)/, '');
                $(`.dokumName`).text(fileName);
            })

            $('#tambahkeluar-form').on('submit', function(e) {
                e.preventDefault();
                let data = new FormData(e.target);
                // console.log(Object.fromEntries(data))
                axios.post('/pengeluaran/tambah', data, {
                        'Content-Type': 'multipart/form-data'
                    })
                    .then(() => {
                        $('#tambahpengeluaran-modal').css('display', 'none')
                        swal.fire('Berhasil tambah data!', '', 'success').then(function() {
                            location.reload();
                        })
                    })
                    .catch(({
                        response
                    }) => {
                        swal.fire('Gagal tambah data!',
                            `<strong class="text-danger">${response.data.message}</strong>`,
                            'warning');
                    });
            })

            //hapus
            $('.table').on('click', '.hapusBtn', function() {
                let idPengeluaran = $(this).closest('tr').attr('idPengeluaran');
                swal.fire({
                    title: "Apakah anda ingin menghapus data ini?",
                    showCancelButton: true,
                    confirmButtonText: 'Setuju',
                    cancelButtonText: `Batal`,
                    confirmButtonColor: 'red'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //proses hapus dieksekusi
                        axios.delete(`/pengeluaran/${idPengeluaran}/hapus`)
                            .then(function(response) {
                                console.log(response);
                                if (response.data.success) {
                                    swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                        location.reload();
                                    });
                                } else {
                                    swal.fire('Gagal di hapus!', '', 'warning');
                                }
                            }).catch(function() {
                                swal.fire('Data gagal di hapus!', '', 'error').then(function() {
                                    location.reload();
                                });
                            });
                    }
                });
            })


            ///edit
            $('.editBtn').on('click', function(e) {
                e.preventDefault();
                let idPengeluaran = $(this).attr('idPengeluaran');
                $(`#edit-pengeluaran-form-${idPengeluaran}`).on('submit', function(e) {
                    e.preventDefault();
                    let data = new FormData(this);
                    console.log(Object.fromEntries(data));
                    axios.post(`/pengeluaran/${idPengeluaran}/edit`, data)
                        .then(() => {
                            $(`#edit-modal-${idPengeluaran}`).css('display', 'none')
                            swal.fire('Berhasil edit data!', '', 'success').then(function() {
                                location.reload();
                            })
                        })
                        .catch(({
                            response
                        }) => {
                            console.log(err)
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
