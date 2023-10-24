<?php

namespace App\Services;

use App\Repositories\Posts\PostsRepository;
use Carbon\Carbon;

/**
 * Class PostsService
 * @package App\Services\PostsService
 */
class PostsService
{
    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository) {
        $this->postsRepository = $postsRepository;
    }

    public function getAll()
    {
        return $this->postsRepository->orderBy('updated_at', 'desc')->paginate(15);
    }

    public function getAllCount()
    {
        return $this->postsRepository->all()->count();
    }

    public function store($params)
    {
        if($params['image']){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }
        return $this->postsRepository->create($params);
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
        return $this->postsRepository->delete($id);
    }

    public function getById($id)
    {
        return $this->postsRepository->find($id);
    }

    public function update($id, $params)
    {
        
        if(array_key_exists('image', $params)){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }

        return $this->getById($id)->update($params);
    }
}
