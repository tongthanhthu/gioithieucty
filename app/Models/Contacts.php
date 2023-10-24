<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Contacts
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $phone
 * @property string $email
 * @property string $timework_vi
 * @property string $timework_en
 * @property string $timework_jp
 * @property string $timework_kr
 * @property string $address_vi
 * @property string $address_en
 * @property string $address_jp
 * @property string $address_kr
 * @property string $about_vi
 * @property string $about_en
 * @property string $about_jp
 * @property string $about_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Contacts extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'contacts';

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
        'phone',
        'email',
        'timework_vi',
        'timework_en',
        'timework_jp',
        'timework_kr',
        'address_vi',
        'address_en',
        'address_jp',
        'address_kr',
        'about_vi',
        'about_en',
        'about_jp',
        'about_kr' ,
        # [/auto-gen-attribute]
    ];

    public function getTimework()
    {
        $locale = app()->getLocale();
        $columnName = "timework_$locale";
        return $this->attributes[$columnName];
    }

    public function getAddress()
    {
        $locale = app()->getLocale();
        $columnName = "address_$locale";
        return $this->attributes[$columnName];
    }

    public function getAbout()
    {
        $locale = app()->getLocale();
        $columnName = "about_$locale";
        return $this->attributes[$columnName];
    }
}
