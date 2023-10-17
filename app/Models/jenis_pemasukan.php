<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_pemasukan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pemasukan';
    protected $primaryKey = 'id_jenis_pemasukan'; // Sesuaikan dengan primary key yang digunakan
    protected $fillable = ['jenis_pemasukan'];
    public $timestamps = false;
}
