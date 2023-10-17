<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class superadmin extends Model
{
    use HasFactory;
    protected $table = 'superadmin';
    protected $primaryKey = 'id_superadmin'; 
    protected $fillable = 'username';
    public $incrementing = false;
    public $timestamps = false;
}