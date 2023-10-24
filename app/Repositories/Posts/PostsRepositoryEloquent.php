<?php

namespace App\Repositories\Posts;

use App\Repositories\BaseRepository;
use App\Models\Posts;

/**
 * Class PostsRepository
 * @package App\Repositories\Posts
 */
class PostsRepositoryEloquent extends BaseRepository implements PostsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Posts::class;
    }
}
