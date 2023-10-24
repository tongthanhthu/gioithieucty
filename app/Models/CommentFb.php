<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CommentFb
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $id_fb
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class CommentFb extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'comment_fbs';

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
        'id_fb' ,
        # [/auto-gen-attribute]
    ];
}
