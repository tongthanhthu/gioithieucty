<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\Seocontent\SeocontentRepository;
use App\Http\Requests\Seocontent\SeocontentStoreRequest;

class SeocontentContronller extends Controller
{
    protected $seocontentRepo;
    public function __construct(SeocontentRepository $seocontentRepo)
    {
        $this->seocontentRepo = $seocontentRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seocontents = $this->seocontentRepo->paginate(20);
        // dd($seocontents->toArray());
        return view('admin.seocontent.index' , ["seocontents" => $seocontents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seocontent.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeocontentStoreRequest $request)
    {
        $params = $request->validated();
        try {
            $seocontents = $this->seocontentRepo->create($params);

            Flash::success('Seo saved successfully.');

            return redirect(route('admin.seocontent.index'));

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
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
        $seocontents = $this->seocontentRepo->find($id);
        if (empty($seocontents)) {
            Flash::error('Không tìm thấy menu');

            return redirect(route('admin.seocontent.index'));
        }
        return view('admin.seocontent.update', ["seocontents" => $seocontents] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeocontentStoreRequest $request, $id)
    {
        $params = $request->validated();
        $seocontents = $this->seocontentRepo->find($id);
        if (empty($seocontents)) {
            Flash::error('Không tìm thấy menu');
            return redirect(route('admin.seocontent.index'));
        }
        $seocontents->update($params);
        return redirect(route('admin.seocontent.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seocontents = $this->seocontentRepo->find($id);
        if (empty($seocontents)) {
            Flash::error('Menu not found');
            return redirect(route('admin.seocontent.index'));
        }
        $this->seocontentRepo->delete($id);
        Flash::success('Menu deleted successfully.');
        return redirect(route('admin.seocontent.index'));
    }
}
