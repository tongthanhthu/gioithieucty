<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Benefit
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $path
 * @property string $des_vi
 * @property string $des_en
 * @property string $des_jp
 * @property string $des_kr
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Benefit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'benefits';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'path',
        'des_vi',
        'des_en',
        'des_jp',
        'des_kr' ,
        # [/auto-gen-attribute]
    ];

    public function getDesc()
    {
        $locale = app()->getLocale();
        $columnName = "des_$locale";
        return $this->$columnName;
    }
}
