<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pengeluaran';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = ['id'];
    public $timestamps = false;
}
