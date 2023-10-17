<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nomor_telepon extends Model
{
    use HasFactory;
    protected $table = 'nomor_telepon';
    protected $primaryKey = 'nomor_telepon';
    public $incrementing = false;
    protected $fillable = ['nomor_telepon', 'id_anggota_jamaah'];
    public $timestamps = false;
}
