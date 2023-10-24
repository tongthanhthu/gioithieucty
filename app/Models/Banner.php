<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Banner
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $status
 * @property int $priority
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Banner extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'banners';

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
        'title_vi',
        'title_en',
        'title_jp',
        'title_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr',
        'image',
        'status',
        'priority' ,
        # [/auto-gen-attribute]
    ];

    public function getTitle()
    {
        $locale = app()->getLocale();
        $columnName = "title_$locale";
        return $this->$columnName;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->$columnName;
    }
}
