<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Image
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $is_default
 * @property string $table_name
 * @property int $table_id
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Image extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'images';

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
        'name',
        'path',
        'is_default',
        'table_name',
        'table_id' ,
        # [/auto-gen-attribute]
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'table_id');
    }
}
