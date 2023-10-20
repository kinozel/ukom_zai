<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorTelepon extends Model
{
    use HasFactory;
    protected $table = 'nomor_telepon';
    protected $primaryKey = 'nomor_telepon';
    protected $keyType = ['int'];
}
