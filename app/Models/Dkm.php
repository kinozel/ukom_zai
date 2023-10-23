<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dkm
 *
 * @property int $id_dkm
 * @property string $username
 * @property string $nama_dkm
 * @property string|null $foto_dkm
 * @method static \Database\Factories\DkmFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm whereFotoDkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm whereIdDkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm whereNamaDkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dkm whereUsername($value)
 * @mixin \Eloquent
 */
class Dkm extends Model
{
    use HasFactory;
    protected $table = 'dkm';
    protected $primaryKey = 'id_dkm';
    protected $keytype = 'string';
    protected $guarded = ['id_dkm'];
    public $timestamps = false;

}
