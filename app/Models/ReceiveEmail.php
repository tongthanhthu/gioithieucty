<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ReceiveEmail
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $email
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class ReceiveEmail extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'receive_emails';

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
        'email' ,
        # [/auto-gen-attribute]
    ];
}
