<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Jamaah
 *
 * @property string $id_anggota_jamaah
 * @property string $username
 * @property string $nama_jamaah
 * @property string $alamat_jamaah
 * @property string|null $foto_jamaah
 * @method static \Database\Factories\JamaahFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah whereAlamatJamaah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah whereFotoJamaah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah whereIdAnggotaJamaah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah whereNamaJamaah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jamaah whereUsername($value)
 * @mixin \Eloquent
 */
class Jamaah extends Model
{
    use HasFactory;
    protected $table = 'jamaah';
    protected $primaryKey = 'id_anggota_jamaah';
    protected $keyType = 'string';
    protected $guarded = ['id_anggota_jamaah'];
}
