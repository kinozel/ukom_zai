<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisPengeluaran;


class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function jenis_pengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class, 'id_jenis_pengeluaran');
    }

}
