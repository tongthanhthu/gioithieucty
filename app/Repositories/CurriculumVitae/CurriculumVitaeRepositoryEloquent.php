<?php

namespace App\Repositories\CurriculumVitae;

use App\Repositories\BaseRepository;
use App\Models\CurriculumVitae;

/**
 * Class CurriculumVitaeRepository
 * @package App\Repositories\CurriculumVitae
 */
class CurriculumVitaeRepositoryEloquent extends BaseRepository implements CurriculumVitaeRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CurriculumVitae::class;
    }
}
