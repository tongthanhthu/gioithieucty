<?php

namespace App\Services;

use App\Repositories\Posts\PostsRepository;

/**
 * Class NewsService
 * @package App\Services\NewsService
 */
class NewsService
{
    protected $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getAll()
    {
        return $this->postsRepository->where('status', STATUS_VALUE_ACTIVE)->orderBy('updated_at', 'desc')->paginate(5);
    }

    public function getBySlug($tag)
    {
        return $this->postsRepository->where('tag_vi', 'like', '%'.$tag.'%')->orWhere('tag_en','like', '%'.$tag.'%')
                    ->orWhere('tag_jp','like', '%'.$tag.'%')->orWhere('tag_kr','like', '%'.$tag.'%')
                    ->where('status', STATUS_VALUE_ACTIVE)->paginate(5);
    }

    public function getDetail($slug)
    {
        return $this->postsRepository->where('slug_vi', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->orWhere('slug_kr', $slug)->first();
    }

    public function getInHome()
    {
        return $this->postsRepository->where('status', STATUS_VALUE_ACTIVE)->orderBy('updated_at', 'desc')->take(3)->get();
    }
}
