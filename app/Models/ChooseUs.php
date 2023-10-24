<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ChooseUs
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $content
 * @property string $link_video
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class ChooseUs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'choose_us';

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
        'content_vi',
        'content_en',
        'content_jp',
        'content_kr',
        'link_video' ,
        # [/auto-gen-attribute]
    ];

    public function getContent()
    {
        $locale = app()->getLocale();
        $columnName = "content_$locale";
        return $this->attributes[$columnName];
    }
}
