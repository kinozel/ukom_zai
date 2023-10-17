saya sudah membuat pdm dengan isi

user
    username                char(50) pk not null
    password                varchar(16)
    role                    enum()

dkm
    id_dkm                  char(10) pk ai not null
    username                varchar(50) pk fk
    nama_dkm                varchar(60)
    foto_dkm                varchar(255)

jamaah
    id_anggota_jamaah       char(10) pk ai not null
    username                varchar(50) pk fk
    nama_jamaah             varchar(60)
    alamat_jamaah           text
    foto_jamaah             varchar(255)

nomor_telepon
    nomor_telepon           integer(13) pk
    id_anggota_jamaah       char(10) pk fk

pemasukan
    id_pemasukan            char(10) pk ai not null
    id_jenis_pemasukan      char(10) pk fk
    id_anggota_jamaah       char(10) pk fk
    jumlah_pemasukan        varchar(20)
    tanggal_pemasukan       datetime

jenis_pemasukan
    id_jenis_pemasukan      char(10) pk ai not null
    jenis_pemasukan         enum()

pengeluaran
    id_pengeluaran          char(10) pk ai not null
    id_jenis_pengeluaran    char(10) pk fk
    jumlah_pengeluaran      char(20)
    tanggal_pengeluaran     datetime
    dokumentasi_pengeluaran varchar(255)

jenis_pengeluaran
    id_jenis_pengeluaran    char(10) pk ai not null
    jenis_pengeluaran       enum()

untuk username pada tabel dkm dan jamaah itu di ambil dari tabel user
untuk id_anggota_jamaah pada tabel nomor_telepon itu di ambil dari tabel jamaah
untuk id_jenis_pemasukan pada tabel pemasukan itu di ambil dari tabel jenis_pemasukan dan id_anggota jamaah pada tabel pemasukan itu di ambil dari tabel jamaah
untuk id_jenis_pengeluaran pada tabel pengeluaran itu di ambil dari tabel jenis_pengeluaran





saya sudah membuat usecase dengan isi 

jamaah
    register
    login
    mengelola data akun pribadi
        tambah/edit nama
        tambah/edit alamat
        tambah/edit foto
        tambah/edit nomor_telepon
    mengelola pemasukan pribadi
        memilih jenis pemasukan
        mengisi jumlah pemasukan
        memberikan tanggal pemasukan(tanggal hari jam menit dan detik dimana jamaah memberikan pemasukan)
        mengisi deskripsi(mendeskripsikan lebih lanjut sesuai jenis yang di pilih ataupun hanya mendeskripsikan pemasukan)
    melihat jumlah saldo kas keseluruhan
    melihat akifitas pengeluaran uang kas
        melihat jumlah pengeluaran uang
        melihat jenis pengeluaran uang
        melihat tanggal pengeluaran uang
        melihat dokumentasi_pengeluaran uang
    logout

dkm
    login
    mengelola data pemasukan
        ubah data pemasukan
        hapus data pemasukan
        melihat data pemasukan
        tambah data pemasukan
        mencari data pemasukan
    mengelola data pengeluaran
        ubah data pengeluaran
        hapus data pengeluaran
        melihat data pengeluaran
        tambah data pengeluaran
        mencari data pengeluaran
    melihat akifitas pengeluaran uang kas
        melihat jumlah pengeluaran uang
        melihat jenis pengeluaran uang
        melihat tanggal pengeluaran uang
        melihat dokumentasi_pengeluaran uang
    melihat jumlah saldo kas keseluruhan
    logout

super admin
    login
    mengelola data akun jamaah
        ubah data akun jamaah
        hapus data akun jamaah
        melihat data akun jamaah
        tambah data akun jamaah
        mencari data akun jamaah
    mengelola data pemasukan
        ubah data pemasukan
        hapus data pemasukan
        melihat data pemasukan
        tambah data pemasukan
        mencari data pemasukan
    mengelola data pengeluaran
        ubah data pengeluaran
        hapus data pengeluaran
        melihat data pengeluaran
        tambah data pengeluaran
        mencari data pengeluaran
    melihat akifitas pengeluaran uang kas
        melihat jumlah pengeluaran uang
        melihat jenis pengeluaran uang
        melihat tanggal pengeluaran uang
        melihat dokumentasi_pengeluaran uang
    melihat jumlah saldo kas keseluruhan
    logout