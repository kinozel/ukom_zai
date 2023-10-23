<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisPemasukan
 *
 * @property int $id
 * @property string $jenis_pemasukan
 * @method static \Database\Factories\JenisPemasukanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPemasukan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPemasukan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPemasukan query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPemasukan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPemasukan whereJenisPemasukan($value)
 * @mixin \Eloquent
 */
class JenisPemasukan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pemasukan';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];
    public $timestamps = false;
}
