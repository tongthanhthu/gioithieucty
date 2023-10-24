<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Logo
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $icon
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Logo extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'logos';

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
        'status',
        'icon',
        'image_share',
        # [/auto-gen-attribute]
    ];
}
