<?php

namespace App\Repositories\CommentFb;

use App\Repositories\BaseRepository;
use App\Models\CommentFb;

/**
 * Class CommentFbRepository
 * @package App\Repositories\CommentFb
 */
class CommentFbRepositoryEloquent extends BaseRepository implements CommentFbRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CommentFb::class;
    }
}
