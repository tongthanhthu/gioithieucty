<?php

namespace App\Services;

use App\Repositories\About404\About404Repository;

/**
 * Class About404Service
 * @package App\Services\About404Service
 */
class About404Service
{

    protected $about404Repository;

    public function __construct(About404Repository $about404Repository) {
        $this->about404Repository = $about404Repository;
    }

    public function getFrirstError()
    {
        return $this->about404Repository->first();
    }

    public function store($params)
    {
        return $this->about404Repository->create($params);
    }

    public function update($id, $params)
    {
        return $this->about404Repository->update($id, $params);
    }

}
