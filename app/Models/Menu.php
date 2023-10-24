<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Menu
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property int $parent_id
 * @property int $position
 * @property string $url
 * @property int $status
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Menu extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'menus';

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
        'name_vi',
        'name_en',
        'name_jp',
        'name_kr',
        'parent_id',
        'position',
        'url_vi' ,
        'url_en' ,
        'url_kr' ,
        'url_jp' ,
        'layout'
        # [/auto-gen-attribute]
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->url_kr = $q->url_en;
            $q->url_jp = $q->url_en;
           
        });

        static::updating(function ($q) {
            $q->url_kr = $q->url_en;
            $q->url_jp = $q->url_en;
        });
    }

    public function getUrl()
    {
        $locale = app()->getLocale();
        $columnName = "url_$locale";
        return $this->$columnName;
    }

    public function getName()
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        return $this->attributes[$columnName];
    }
}
