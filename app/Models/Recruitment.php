<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Recruitment
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $slug
 * @property string $location_vi
 * @property string $location_en
 * @property string $location_jp
 * @property string $location_kr
 * @property string $exp_vi
 * @property string $exp_en
 * @property string $exp_jp
 * @property string $exp_kr
 * @property string $wage_vi
 * @property string $wage_en
 * @property string $wage_jp
 * @property string $wage_kr
 * @property string $form_vi
 * @property string $form_en
 * @property string $form_jp
 * @property string $form_kr
 * @property string $deadline_vi
 * @property string $deadline_en
 * @property string $deadline_jp
 * @property string $deadline_kr
 * @property string $rank_vi
 * @property string $rank_en
 * @property string $rank_jp
 * @property string $rank_kr
 * @property string $welfare
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $request_vi
 * @property string $request_en
 * @property string $request_jp
 * @property string $request_kr
 * @property string $other_vi
 * @property string $other_en
 * @property string $other_jp
 * @property string $other_kr
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Recruitment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'recruitments';

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
        'name_vi',
        'name_en',
        'name_jp',
        'name_kr',
        'slug_vi',
        'slug_en',
        'slug_jp',
        'slug_kr',
        'location_vi',
        'location_en',
        'location_jp',
        'location_kr',
        'exp_vi',
        'exp_en',
        'exp_jp',
        'exp_kr',
        'wage_vi',
        'wage_en',
        'wage_jp',
        'wage_kr',
        'form_vi',
        'form_en',
        'form_jp',
        'form_kr',
        'deadline_vi',
        'deadline_en',
        'deadline_jp',
        'deadline_kr',
        'rank_vi',
        'rank_en',
        'rank_jp',
        'rank_kr',
        'welfare',
        'description_vi',
        'description_en',
        'description_jp',
        'description_kr',
        'request_vi',
        'request_en',
        'request_jp',
        'request_kr',
        'right_vi',
        'right_en',
        'right_jp',
        'right_kr' ,
        'other_vi',
        'other_en',
        'other_jp',
        'other_kr' ,
        'job_category_id',
        # [/auto-gen-attribute]
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($q) {
            $q->slug_vi = Str::slug($q->name_vi);
            $q->slug_en = Str::slug($q->name_en);
            $q->slug_jp = Str::slug($q->name_en);
            $q->slug_kr = Str::slug($q->name_en);
        });

        static::updating(function ($q) {
            $q->slug_vi = Str::slug($q->name_vi);
            $q->slug_en = Str::slug($q->name_en);
            $q->slug_jp = Str::slug($q->name_en);
            $q->slug_kr = Str::slug($q->name_en);
        });
    }

    public function benefits()
    {
        return $this->hasManyThrough('App\Models\Benefit',
                                     'App\Models\RecruitmentBenefit',
                                     'recruitment_id', 'id', 'id', 'benefit_id');
    }

    public function jobCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function getName()
    {
        $locale = app()->getLocale();
        $columnName = "name_$locale";
        return $this->attributes[$columnName];
    }

    public function getSlug()
    {
        $locale = app()->getLocale();
        $columnName = "slug_$locale";
        return $this->attributes[$columnName];
    }

    public function getLocation()
    {
        $locale = app()->getLocale();
        $columnName = "location_$locale";
        return $this->attributes[$columnName];
    }

    public function getExp()
    {
        $locale = app()->getLocale();
        $columnName = "exp_$locale";
        return $this->attributes[$columnName];
    }

    public function getWage()
    {
        $locale = app()->getLocale();
        $columnName = "wage_$locale";
        return $this->attributes[$columnName];
    }

    public function getForm()
    {
        $locale = app()->getLocale();
        $columnName = "form_$locale";
        return $this->attributes[$columnName];
    }

    public function getDeadline()
    {
        $locale = app()->getLocale();
        $columnName = "deadline_$locale";
        return $this->attributes[$columnName];
    }

    public function getRank()
    {
        $locale = app()->getLocale();
        $columnName = "rank_$locale";
        return $this->$columnName;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();
        $columnName = "description_$locale";
        return $this->$columnName;
    }

    public function getRequest()
    {
        $locale = app()->getLocale();
        $columnName = "request_$locale";
        return $this->$columnName;
    }
    
    public function getRight()
    {
        $locale = app()->getLocale();
        $columnName = "right_$locale";
        return $this->$columnName;
    }

    public function getOther()
    {
        $locale = app()->getLocale();
        $columnName = "other_$locale";
        return $this->$columnName;
    }
}
