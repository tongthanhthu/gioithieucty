<?php

namespace App\Services;

use App\Repositories\JobCategory\JobCategoryRepository;

/**
 * Class PostsService
 * @package App\Services\PostsService
 */
class JobCategoryService
{
    protected $jobCateRepo;

    public function __construct(JobCategoryRepository $jobCateRepo) {
        $this->jobCateRepo = $jobCateRepo;
    }

    public function getAll()
    {
        return $this->jobCateRepo->all();
    }

    public function getDetail($slug)
    {
        return $this->jobCateRepo->where('slug_vi', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->orWhere('slug_kr', $slug)->first();
    }

    public function store($params)
    {
        return $this->jobCateRepo->create($params);
    }

  

    public function delete($id)
    {
        return $this->jobCateRepo->delete($id);
    }

    public function getById($id)
    {
        return $this->jobCateRepo->find($id);
    }

    public function update($id, $params)
    {
        return $this->getById($id)->update($params);
    }
}
