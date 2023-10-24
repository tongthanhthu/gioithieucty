<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class RecruitmentBenefit
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $recruitment_id
 * @property int $benefit_id
 * @property int $created_by
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class RecruitmentBenefit extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'recruitment_benefits';

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
        'recruitment_id',
        'benefit_id',
        'created_by' ,
        # [/auto-gen-attribute]
    ];
}
