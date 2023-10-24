<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Repositories\Menu\MenuRepository;
use App\Http\Requests\Menu\MenuStoreRequest;
use App\Services\MenusService;
use Exception;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    protected $service, $menuRepo;
    public function __construct(MenuRepository $menuRepo, MenusService $service)
    {
        $this->menuRepo = $menuRepo;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if($id)
        {
            $menuParent = $this->menuRepo->where('parent_id', $id)->where('layout', 0)->orderBy('position', 'asc')->get();
        }else{
            $menuParent = $this->menuRepo->where('parent_id', 0)->where('layout', 0)->orderBy('position', 'asc')->get();
        }
        $menus = $this->menuRepo->where('layout', 0)->get();
        $menuTree = $this->buildMenuTree($menus);

        return view('admin.menu.index', compact('menus','menuTree', 'menuParent'));
    }

    private function buildMenuTree($menus, $parentId = 0)
    {
        $menuTree = [];

        foreach ($menus as $menu) {
            if ($menu->parent_id === $parentId) {
                $menu->children = $this->buildMenuTree($menus, $menu->id);
                $menuTree[] = $menu;
            }
        }

        return $menuTree;
    }

    public function home()
    {
        return view('admin.menu.home');
    }

    public function layout($layout)
    {
        $menuParent = $this->menuRepo->where('parent_id', 0)->where('layout', $layout)->orderBy('position', 'asc')->get();
        $menus = $this->menuRepo->where('layout', $layout)->get();
        $menuTree = $this->buildMenuTree($menus);
        return view('admin.menu.index_bk', compact('menus','menuTree', 'menuParent'));
    }

    public function moveSort(Request $request)
    {
        try{
            $data = $request->all();
            $this->service->moveSort($data);
            return response()->json(['status' => true]);
        }catch(Exception $e)
        {
            return response()->json(['status' => false]);
        }
    }

    public function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item){
            if($item['parent_id'] == $parent_id){
                $item['level'] = $level;
                $result[] = $item;
                $child = $this->data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
                unset($data[$item['id']]);
            }
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = $this->menuRepo->all();
        $menus = $this->data_tree($menus->toArray());
        $routes = Route::getRoutes();
        return view('admin.menu.add' , ["menus" => $menus, "routes" => $routes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $params = $request->validated();
        try {
            $menu = $this->service->create($params);

            Flash::success('Thêm menu thành công.');

            return redirect(route('admin.menus.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $menu = $this->menuRepo->find($id);
        if (empty($menu)) {
            Flash::error('Không tìm thấy menu');

            return redirect(route('admin.menus.index'));
        }
        $menus = $this->menuRepo->all();
        return view('admin.menu.update', ["menus" => $menus , "menu" => $menu] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuStoreRequest $request, $id)
    {
        $params = $request->validated();
        $menu = $this->menuRepo->find($id);
        if (empty($menu)) {
            Flash::error('Không tìm thấy menu');
            return redirect(route('admin.menus.index'));
        }
        $menu->update($params);
        return redirect(route('admin.menus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = $this->menuRepo->find($id);
        if (empty($menu)) {
            Flash::error('Menu not found');
            return redirect(route('admin.menus.index'));
        }
        $this->menuRepo->delete($id);
        Flash::success('Menu deleted successfully.');
        return redirect(route('admin.menus.index'));
    }
}
