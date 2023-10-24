<?php

namespace App\Services;

use App\Repositories\FactoryData\FactoryDataRepository;

/**
 * Class ContactService
 * @package App\Services\ContactService
 */
class FactoryDataService
{
    protected $dataRepo;

    public function __construct(FactoryDataRepository $dataRepo) {
        $this->dataRepo = $dataRepo;
    }

    public function getFrirstContact()
    {
        return $this->dataRepo->first();
    }

    public function store($params)
    {
        return $this->dataRepo->create($params);
    }

    public function update($id, $params)
    {
        return $this->dataRepo->update($id, $params);
    }
}
