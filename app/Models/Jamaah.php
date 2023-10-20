<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaah';
    protected $primaryKey = 'id_anggota_jamaah';
    protected $keyType = 'string';
    protected $guarded = ['id_anggota_jamaah'];
}
