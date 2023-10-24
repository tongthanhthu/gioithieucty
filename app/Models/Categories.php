<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


/**
 * Class Categories
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $parent_id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $slug_vi
 * @property string $slug_en
 * @property string $slug_jp
 * @property string $slug_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property int $status
 * @property int $position
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Categories extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'categories';

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
        'parent_id',
        'name_vi',
        'name_en',
        'name_jp',
        'name_kr',
        'slug_vi',
        'slug_en',
        'slug_jp',
        'slug_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr',
        'status',
        'position' ,
        # [/auto-gen-attribute]
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->slug_vi = Str::slug($q->name_vi);
            $q->slug_en = Str::slug($q->name_en);
            $q->slug_jp = Str::slug($q->name_en);
            $q->slug_kr = Str::slug($q->name_en);
        });

        static::updating(function ($q) {
            $q->slug_vi = Str::slug($q->name_vi);
            $q->slug_en = Str::slug($q->name_en);
            $q->slug_jp = Str::slug($q->name_en);
            $q->slug_kr = Str::slug($q->name_en);
        });
    }

    public function getName()
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        return $this->attributes[$columnName];
    }

     public function setNameAttribute($value)
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        $this->attributes[$columnName] = $value;
    }

    public function getSlug()
    {
        $locale = app()->getLocale();
        $columnName = "slug_$locale";
        return $this->attributes[$columnName];
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->attributes[$columnName];
    }
}
