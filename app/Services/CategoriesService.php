<?php

namespace App\Services;

use App\Models\Categories;
use App\Repositories\Categories\CategoriesRepository;

/**
 * Class CategoriesService
 * @package App\Services\CategoriesService
 */
class CategoriesService
{
    protected $categoriesRepository;
    protected $categories;
    /**
     * Map model
     * @return mixed
     */
    public function __construct
    (
        CategoriesRepository $categoriesRepository,
        Categories $categories
    )
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->categories = $categories;
    }

    public function store($category)
    {
        return $this->categoriesRepository->create($category);

    }

    public function getList()
    {
        $data = $this->categories->withCount('products')->get();
        $cat_tree = $this->data_tree($data->toArray());
        
        return $cat_tree;
    }

    public function getListSub()
    {
        return $this->categoriesRepository->where('status', STATUS_VALUE_ACTIVE)->where('parent_id', 0)->get();
    }
    

    private function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = $this->data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function delete($id)
    {
        return $this->categoriesRepository->delete($id);
    }

    public function getById($id)
    {
        return $this->categoriesRepository->find($id);
    }

    public function update($id, $category)
    {
        return $this->categoriesRepository->update($id, $category);
    }

    public function getCheckCategoryParent($id)
    {
        return $this->categoriesRepository->where('parent_id', $id)->count();
    }
}
