<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Services\NewsService;
use Illuminate\Http\Request;

/**
 * Class NewsController
 * @package App\Http\Controllers\Client
 */
class NewsController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        if(!isset($request->tag))
        {
            $news = $this->service->getAll();
        }else{
            $news = $this->service->getBySlug($request->tag);
        }
        return view('client.page.news.index', compact('news'));
    }

    public function detail($slug)
    {
        $new = $this->service->getDetail($slug);
        return view('client.page.news.detail', compact('new'));
    }
    // searchNew
    public function searchNew(Request $request)
    {
        $keyword = $request->keyword;
        $news = Posts::query()->where('title_vi', 'like', '%' .$keyword . '%')->orderBy('id', 'desc')->paginate(5);
        return view('client.page.news.list',compact( 'keyword', 'news'));
    }
}
