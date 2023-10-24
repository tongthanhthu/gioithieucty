<?php

namespace App\Repositories\Partner;

use App\Repositories\BaseRepository;
use App\Models\Partner;

/**
 * Class PartnerRepository
 * @package App\Repositories\Partner
 */
class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Partner::class;
    }
}
