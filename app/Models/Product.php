<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


/**
 * Class Product
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $client_vi
 * @property string $client_en
 * @property string $client_jp
 * @property string $client_kr
 * @property string $status
 * @property string $location_vi
 * @property string $location_en
 * @property string $location_jp
 * @property string $location_kr
 * @property string $building_area_vi
 * @property string $building_area_en
 * @property string $building_area_jp
 * @property string $building_area_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property int $created_by
 * @property int $category_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Product extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'products';

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
        'slug_vi',
        'slug_en',
        'slug_jp',
        'slug_kr',
        'info_product_vi',
        'info_product_en',
        'info_product_jp',
        'info_product_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr',
        'created_by',
        'category_id',
        # [/auto-gen-attribute]
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->slug_vi = Str::slug($q->name_vi) ;
            $q->slug_en = Str::slug($q->name_en) ;
            $q->slug_jp = Str::slug($q->name_en) ;
            $q->slug_kr = Str::slug($q->name_en) ;
        });

        // static::updating(function ($q) {
        //     $q->slug_vi = Str::slug($q->name_vi);
        //     $q->slug_en = Str::slug($q->name_en);
        //     $q->slug_jp = Str::slug($q->name_en);
        //     $q->slug_kr = Str::slug($q->name_en);
        // });
    }
    public function getNameAttribute()
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


    public function image()
    {
        return $this->hasOne(Image::class, 'table_id')
                    ->where('table_name', '=', $this->table)
                    ->where('is_default', true);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'table_id')
                    ->where('table_name', '=', $this->table)
                    ->where('is_default', false);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function getName()
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        return $this->$columnName;
    }

    public function getSlug()
    {
        $locale = app()->getLocale();
        $columnName = "slug_$locale";
        return $this->$columnName;
    }

    public function getInfoProduct()
    {
        $locale = app()->getLocale();
        $columnName = "info_product_$locale";
        return $this->$columnName;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->$columnName;
    }
}
