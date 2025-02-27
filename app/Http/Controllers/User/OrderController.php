<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Product\UserProductStoreRequest;
use App\Http\Requests\User\Product\UserProductUpdateRequest;
use App\Http\Resources\User\Product\ProductIndexResource;
use App\Http\Resources\User\Product\UserProductStoreResource;
use App\Http\Resources\User\Product\UserProductUpdateResource;
use App\Models\Category;
use App\Models\Product;
use App\Services\User\OrderService;
use App\Services\User\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = OrderService::index();
        $productResource = OrderIndexResource::collection($products)->resolve();
        return view('user/product/index', compact('productResource'));
    }

    public function show(Product $product): Factory|View|Application
    {
        $product = ProductIndexResource::make($product)->resolve();
        return view('user/product/show', compact('product'));
    }

    public function create(): Factory|View|Application
    {
        return view('user/product/create');
    }

    public function store(UserProductStoreRequest $request): Factory|View|Application
    {
        $data = $request->validated();
        $product = ProductService::store($data)->resolve();
        $resourceProduct = UserProductStoreResource::make($product)->resolve();
        return view('user/product/index', compact('resourceProduct'));

    }

    public function edit($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('user/product/edit', compact('product', 'categories'));

    }

    public function update(UserProductUpdateRequest $request,Product $product,): RedirectResponse
    {
        $data = $request->validated();
        $product = ProductService::update($product, $data);
        $resourceProduct = UserProductUpdateResource::make($product)->resolve();
        return redirect()->route('user.product.index',compact('resourceProduct'))->with('success', 'Продукт успешно обновлён');
    }

    public function destroy(Product $product): RedirectResponse
    {
        ProductService::destroy($product);
        return redirect()->route('user.product.index');
    }
}
