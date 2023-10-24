<?php

namespace App\Services;


use App\Repositories\Posts\PostsRepository;
use App\Repositories\Product\ProductRepository;

/**
 * Class HomepageService
 * @package App\Services\HomepageService
 */
class HomepageService
{
    protected $productRepository;
    protected $newRepository;

    public function __construct(ProductRepository $productRepository, PostsRepository $newRepository)
    {
        $this->productRepository = $productRepository;
        $this->newRepository     = $newRepository;
    }

    public function search($request)
    {
        $data['products'] = $this->productRepository->where('name_'. $request->lang, 'like', '%' . $request->keyword . '%')
                                            ->with('image')
                                            ->orderByDesc('updated_at')
                                            ->limit(5)
                                            ->get();

        $data['news'] = $this->newRepository->where('title_'. $request->lang, 'like', '%' . $request->keyword . '%')
                                    ->orderByDesc('updated_at')
                                    ->limit(5)
                                    ->get();

        return $data;
    }
}
