<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = ['id_jenis_pemasukan', 'id_anggota_jamaah', 'jumlah_pemasukan', 'tanggal_pemasukan', 'deskripsi'];
    public $timestamps = false;
}
