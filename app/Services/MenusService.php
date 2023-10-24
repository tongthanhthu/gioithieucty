<?php

namespace App\Services;

use App\Repositories\Menu\MenuRepository;
use Carbon\Carbon;

/**
 * Class MenusService
 * @package App\Services\MenusService
 */
class MenusService
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository) {
        $this->menuRepository = $menuRepository;
    }


    public function moveSort($data)
    {
        foreach ($data as $id => $item)
        {
            $menu = $this->menuRepository->find($id);
            $menu->position = $item;
            $menu->save();
        }
        return true;
    }

    public function create($params)
    {
        $parentId = $params['parent_id'];
        $highestPosition = $this->menuRepository->where('parent_id', $parentId)->max('position');
        if($highestPosition) $params['position'] = $highestPosition + 1;
        $menu = $this->menuRepository->create($params);
        return $menu;
    }
}
