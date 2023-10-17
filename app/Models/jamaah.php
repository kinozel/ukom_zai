<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaah';
    protected $primaryKey = 'id_anggota_jamaah'; // Sesuaikan dengan primary key yang digunakan
    protected $fillable = ['username', 'nama_jamaah', 'alamat_jamaah', 'foto_jamaah'];
    public $timestamps = false;
}
