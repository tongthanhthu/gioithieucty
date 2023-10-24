<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Counts
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $cnt_products
 * @property int $cnt_news
 * @property int $cnt_cvs
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Counts extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'counts';

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
        'cnt_products',
        'cnt_news',
        'cnt_cvs' ,
        # [/auto-gen-attribute]
    ];
}
