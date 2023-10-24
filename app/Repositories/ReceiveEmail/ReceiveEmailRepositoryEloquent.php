<?php

namespace App\Repositories\ReceiveEmail;

use App\Repositories\BaseRepository;
use App\Models\ReceiveEmail;

/**
 * Class ReceiveEmailRepository
 * @package App\Repositories\ReceiveEmail
 */
class ReceiveEmailRepositoryEloquent extends BaseRepository implements ReceiveEmailRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ReceiveEmail::class;
    }
}
