<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisPemasukan;

/**
 * App\Models\Pemasukan
 *
 * @property int $id
 * @property int $id_jenis_pemasukan
 * @property string $jumlah_pemasukan
 * @property string $tanggal_pemasukan
 * @property string|null $deskripsi
 * @property-read JenisPemasukan $jenis
 * @method static \Database\Factories\PemasukanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereIdJenisPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereJumlahPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereTanggalPemasukan($value)
 * @mixin \Eloquent
 */
class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function jenis()
    {
        return $this->belongsTo(JenisPemasukan::class, 'id_jenis_pemasukan');
    }
}
