<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Ceo
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $position_vi
 * @property string $position_en
 * @property string $position_jp
 * @property string $position_kr
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
class Ceo extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'ceo';

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
        'image',
        'name_vi',
        'name_en',
        'name_jp',
        'name_kr',
        'position_vi',
        'position_en',
        'position_jp',
        'position_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr' ,
        # [/auto-gen-attribute]
    ];

    public function getName()
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        return $this->attributes[$columnName];
    }

    public function getPosition()
    {
        $locale = app()->getLocale();
        $columnName = "position_$locale";
        return $this->attributes[$columnName];
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->attributes[$columnName];
    }
}
