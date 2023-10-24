<?php

namespace App\Services;

use App\Repositories\Introduce\IntroduceRepository;
use Carbon\Carbon;

/**
 * Class PostsService
 * @package App\Services\PostsService
 */
class IntroduceService
{
    protected $introduceRepo;

    public function __construct(IntroduceRepository $introduceRepo) {
        $this->introduceRepo = $introduceRepo;
    }

    public function getAll()
    {
        return $this->introduceRepo->all();
    }

    public function getDetail($slug)
    {
        return $this->introduceRepo->where('slug_vi', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->orWhere('slug_kr', $slug)->first();
    }

    public function getIntrolduce()
    {
        return $this->introduceRepo->take(2)->get();
    }

    public function store($params)
    {
        return $this->introduceRepo->create($params);
    }

    private function uploadFile($file)
    {
        $typeFile = $file->getClientOriginalExtension();
        $fullNameFile = str_replace(".".$typeFile, '', $file->getClientOriginalName());
        $numberRandom = mt_rand(1, 9999);
        $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
        $path = $file->storeAs('public/uploads/posts', $nameFile);

        return $path;
    }

    public function delete($id)
    {
        return $this->introduceRepo->delete($id);
    }

    public function getById($id)
    {
        return $this->introduceRepo->find($id);
    }

    public function update($id, $params)
    {
        return $this->getById($id)->update($params);
    }
}
