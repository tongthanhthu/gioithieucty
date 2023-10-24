<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Partner
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $image
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Partner extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'partners';

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
        'title',
        'url',
        'image',
        'status' ,
        # [/auto-gen-attribute]
    ];
}
