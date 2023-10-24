<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Media
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $link_twitter
 * @property string $link_facebook
 * @property string $link_instagram
 * @property string $link_youtube
 * @property string $link_google
 * @property string $link_messenger
 * @property string $link_ggmap
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Media extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'social_medias';

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
        'link_twitter',
        'link_facebook',
        'link_instagram',
        'link_youtube',
        'link_google' ,
        'link_messenger' ,
        'link_ggmap' ,
        # [/auto-gen-attribute]
    ];
}
