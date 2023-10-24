<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class FactoryData
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $factory
 * @property int $machines
 * @property int $human
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class FactoryData extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'factory_datas';

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
        'factory',
        'machines',
        'human' ,
        # [/auto-gen-attribute]
    ];
}
