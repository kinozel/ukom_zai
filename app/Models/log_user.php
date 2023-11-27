<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class log_user extends Model
{
    use HasFactory;
    protected $table = 'logs_user';
    protected $primaryKey = 'username';
    protected $guarded = ['username'];

    public $timestamps = false;
}
