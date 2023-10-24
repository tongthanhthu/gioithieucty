<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Introduce
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_jp
 * @property string $title_kr
 * @property string $slug_vi
 * @property string $slug_en
 * @property string $slug_jp
 * @property string $slug_kr
 * @property string $description_short_vi
 * @property string $description_short_en
 * @property string $description_short_jp
 * @property string $description_short_kr
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
class Introduce extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'introduces';

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
        'title_vi',
        'title_en',
        'title_jp',
        'title_kr',
        'slug_vi',
        'slug_en',
        'slug_jp',
        'slug_kr',
        'description_short_vi',
        'description_short_en',
        'description_short_jp',
        'description_short_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr' ,
        # [/auto-gen-attribute]
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->slug_vi = Str::slug($q->title_vi);
            $q->slug_en = Str::slug($q->title_en);
            $q->slug_jp = Str::slug($q->title_en);
            $q->slug_kr = Str::slug($q->title_en);
        });

        static::updating(function ($q) {
            $q->slug_vi = Str::slug($q->title_vi);
            $q->slug_en = Str::slug($q->title_en);
            $q->slug_jp = Str::slug($q->title_en);
            $q->slug_kr = Str::slug($q->title_en);
        });
    }

    public function getTitle()
    {
        $locale = app()->getLocale();
        $columnName = "title_$locale";
        return $this->$columnName;
    }

    public function getSlug()
    {
        $locale = app()->getLocale();
        $columnName = "slug_$locale";
        return $this->$columnName;
    }

    public function getDescriptionShort()
    {
        $locale = app()->getLocale();
        $columnName = "description_short_$locale";
        return $this->$columnName;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->$columnName;
    }
}
