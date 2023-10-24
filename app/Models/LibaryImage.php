<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class LibaryImage
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class LibaryImage extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'libary_images';

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
        'image' ,
        # [/auto-gen-attribute]
    ];
}
