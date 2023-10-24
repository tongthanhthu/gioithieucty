<?php

namespace App\Repositories\RecruitmentBenefit;

use App\Repositories\BaseRepository;
use App\Models\RecruitmentBenefit;

/**
 * Class RecruitmentBenefitRepository
 * @package App\Repositories\RecruitmentBenefit
 */
class RecruitmentBenefitRepositoryEloquent extends BaseRepository implements RecruitmentBenefitRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return RecruitmentBenefit::class;
    }
}
