<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dkm extends Model
{
    use HasFactory;
    protected $table = 'dkm';
    protected $primaryKey = 'id_dkm';
    protected $keytype = 'string';
    protected $guarded = ['id_dkm'];
    public $timestamps = false;

}
