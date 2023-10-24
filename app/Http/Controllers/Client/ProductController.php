<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Repositories\Product\ProductRepository;

/**
 * Class ProductController
 * @package App\Http\Controllers\Admin
 */
class ProductController extends Controller
{
    protected $service, $productRepo;

    /**
     * Map model
     * @return mixed
     */
    public function __construct(ProductService $service, ProductRepository $productRepo)
    {
        $this->service = $service;
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $param = request()->all();
        $products = $this->service->getAll($param);
        $categories = $this->service->getCategory();

        return view('client.page.products.index', compact('products','categories'));
    }

    public function get($slug)
    {
        $product = $this->service->get($slug);

        $categories = $this->service->getCategory();

        return view('client.page.products.detail', compact('product','categories'));
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->keyword;
        $products = $this->productRepo
        ->where('name_vi', 'like', '%' .$keyword . '%')
        ->orWhere('name_en', 'like', '%' .$keyword . '%')
        ->orWhere('name_jp', 'like', '%' .$keyword . '%')
        ->orWhere('name_kr', 'like', '%' .$keyword . '%')
        ->orderBy('id', 'desc')->paginate(20);
        return view('client.page.products.list',compact('products' , 'keyword'));
    }
}
