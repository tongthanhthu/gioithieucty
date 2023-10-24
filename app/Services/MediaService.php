<?php

namespace App\Services;

use App\Repositories\Media\MediaRepository;

/**
 * Class ContactService
 * @package App\Services\ContactService
 */
class MediaService
{
    protected $mediaRepo;

    public function __construct(MediaRepository $mediaRepo) {
        $this->mediaRepo = $mediaRepo;
    }

    public function getFrirstContact()
    {
        return $this->mediaRepo->first();
    }

    public function store($params)
    {
        return $this->mediaRepo->create($params);
    }

    public function update($id, $params)
    {
        return $this->mediaRepo->update($id, $params);
    }
}
