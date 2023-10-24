<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class About404
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class About404 extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'about404';

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
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr' ,
        # [/auto-gen-attribute]
    ];

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->attributes[$columnName];
    }
}
