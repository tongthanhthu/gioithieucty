<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\CompanyIntroduceService;
use App\Services\FactoryDataService;
use App\Services\HomepageService;
use App\Services\IntroduceService;
use App\Services\LogoService;
use App\Services\NewsService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Client
 */
class HomepageController extends Controller
{
    protected $service;
    protected $companyIntroduceService;
    protected $introduceService;
    protected $bannerService;
    protected $factoryDataService;
    protected $productService;
    protected $newsService;
    /**
     * Map model
     * @return mixed
     */
    public function __construct
    (
        HomepageService $service,
        CompanyIntroduceService $companyIntroduceService,
        IntroduceService $introduceService,
        BannerService $bannerService,
        FactoryDataService $factoryDataService,
        ProductService $productService,
        NewsService $newsService
    ){
        $this->service = $service;
        $this->companyIntroduceService = $companyIntroduceService;
        $this->introduceService = $introduceService;
        $this->bannerService = $bannerService;
        $this->factoryDataService = $factoryDataService;
        $this->productService = $productService;
        $this->newsService = $newsService;
    }

    public function index()
    {
        $banners = $this->bannerService->getAll();
        $companyIntroduce = $this->companyIntroduceService->getInfor();
        $introduces = $this->introduceService->getIntrolduce();
        $factoryData = $this->factoryDataService->getFrirstContact();
        $products = $this->productService->getInHome();
        $categories = $this->productService->getCategory();
        $news = $this->newsService->getInHome();

        return view('client.page.index', compact('companyIntroduce','banners','introduces', 'factoryData','products','categories', 'news'));
    }

    public function change($lang)
    {

        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect(route('index'));
    }

    public function search(Request $request)
    {
        $data = $this->service->search($request);
        $products = $data['products'];
        $news = $data['news'];

        $view = view('client.layouts.search', compact('products', 'news'))->render();
        return response()->json($view);
    }
}
