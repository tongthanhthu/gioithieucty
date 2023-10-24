<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CompanyHistories
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $formation_time
 * @property string $image
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_jp
 * @property string $title_kr
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
class CompanyHistories extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'company_histories';

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
        'formation_time',
        'image',
        'title_vi',
        'title_en',
        'title_jp',
        'title_kr',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr' ,
        # [/auto-gen-attribute]
    ];

    public function getTitle()
    {
        $locale = app()->getLocale();
        $columnName = "title_$locale";
        return $this->attributes[$columnName];
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->attributes[$columnName];
    }
}
