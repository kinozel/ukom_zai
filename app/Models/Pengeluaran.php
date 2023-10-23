<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisPengeluaran;


/**
 * App\Models\Pengeluaran
 *
 * @property int $id
 * @property int $id_jenis_pengeluaran
 * @property string $jumlah_pengeluaran
 * @property string $tanggal_pengeluaran
 * @property string|null $dokumentasi_pengeluaran
 * @property-read JenisPengeluaran $jenis_pengeluaran
 * @method static \Database\Factories\PengeluaranFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereDokumentasiPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereIdJenisPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereJumlahPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereTanggalPengeluaran($value)
 * @mixin \Eloquent
 */
class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function jenis_pengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class, 'id_jenis_pengeluaran');
    }

}
