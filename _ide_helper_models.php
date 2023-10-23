<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Dkm extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Jamaah extends \Eloquent {}
}

namespace App\Models{
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
 */
	class JenisPemasukan extends \Eloquent {}
}

namespace App\Models{
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
 */
	class JenisPengeluaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Log
 *
 * @property int $id
 * @property string $action
 * @property string $log
 * @property string $created_at
 * @method static \Database\Factories\LogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereLog($value)
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pemasukan
 *
 * @property int $id
 * @property int $id_jenis_pemasukan
 * @property string $jumlah_pemasukan
 * @property string $tanggal_pemasukan
 * @property string|null $deskripsi
 * @property-read \App\Models\JenisPemasukan $jenis
 * @method static \Database\Factories\PemasukanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereIdJenisPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereJumlahPemasukan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemasukan whereTanggalPemasukan($value)
 */
	class Pemasukan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengeluaran
 *
 * @property int $id
 * @property int $id_jenis_pengeluaran
 * @property string $jumlah_pengeluaran
 * @property string $tanggal_pengeluaran
 * @property string|null $dokumentasi_pengeluaran
 * @property-read \App\Models\JenisPengeluaran $jenis_pengeluaran
 * @method static \Database\Factories\PengeluaranFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereDokumentasiPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereIdJenisPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereJumlahPengeluaran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengeluaran whereTanggalPengeluaran($value)
 */
	class Pengeluaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $username
 * @property string $password
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

