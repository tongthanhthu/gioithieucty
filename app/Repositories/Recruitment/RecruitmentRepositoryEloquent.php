<?php

namespace App\Repositories\Recruitment;

use App\Repositories\BaseRepository;
use App\Models\Recruitment;

/**
 * Class RecruitmentRepository
 * @package App\Repositories\Recruitment
 */
class RecruitmentRepositoryEloquent extends BaseRepository implements RecruitmentRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Recruitment::class;
    }
}
