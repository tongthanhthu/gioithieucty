<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Seocontent
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $position
 * @property string $description
 * @property string $keywords
 * @property string $property_name
 * @property string $property_description
 * @property string $property_og_title
 * @property string $property_og_description
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Seocontent extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'seo_contents';

    const SEO_HOME_PAGE = 0;
    const SEO_INTRODUCE = 1; 
    const SEO_PRODUCT = 2;
    const SEO_NEWS = 3;
    const SEO_RECRUITMENT = 4;
    const SEO_CONTACT = 5;

    public static $position = [
        self::SEO_HOME_PAGE => "Trang Chủ",
        self::SEO_INTRODUCE => "Giới thiệu",
        self::SEO_PRODUCT => "Sản phẩm",
        self::SEO_NEWS => "Tin tức",
        self::SEO_RECRUITMENT => "Tuyển dụng",
        self::SEO_CONTACT => "Liên hệ",
    ];
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
        'position',
        'description',
        'keywords',
        'property_name',
        'property_description',
        'property_og_title',
        'property_og_description' ,
        # [/auto-gen-attribute]
    ];
}
