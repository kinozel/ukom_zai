<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dkm extends Model
{
    use HasFactory;
    protected $table = 'dkm';
    protected $primaryKey = 'id_dkm'; 
    protected $fillable = ['username', 'nama_dkm', 'foto_dkm'];
    public $timestamps = false;
}
