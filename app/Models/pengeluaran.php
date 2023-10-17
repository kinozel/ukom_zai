<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran'; // Sesuaikan dengan primary key yang digunakan
    protected $fillable = ['id_jenis_pengeluaran', 'jumlah_pengeluaran', 'tanggal_pengeluaran', 'dokumentasi_pengeluaran'];
    public $timestamps = false;
}
