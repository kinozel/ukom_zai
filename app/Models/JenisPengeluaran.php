<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisPengeluaran
 *
 * @property string $id
 * @property string $jenis_pengeluaran
 * @method static \Database\Factories\JenisPengeluaranFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPengeluaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPengeluaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPengeluaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPengeluaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPengeluaran whereJenisPengeluaran($value)
 * @mixin \Eloquent
 */
class JenisPengeluaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pengeluaran';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $guarded = ['id'];
    public $timestamps = false;
}
