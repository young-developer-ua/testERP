<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    public function show(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('show', $product);
        $productData = ProductResource::make($product)->resolve();

        return view('products.show', compact('productData'));
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('index', Product::class);

        $products = $this->productService->getUserProducts();
        $productsData = ProductResource::collection($products)->resolve();

        return view('products.index', compact('productsData'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('create', Product::class);

        return view('products.create');
    }

    public function store(CreateRequest $createRequest): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', Product::class);
        $this->productService->createProduct($createRequest);

        return redirect()->route('products.index')->with('success', 'Товар успішно створено!');
    }

    public function edit(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('update', $product);

        return view('products.edit', compact('product'));
    }

    public function update(UpdateRequest $updateRequest, Product $product): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('update', $product);
        $this->productService->updateProduct($updateRequest, $product);

        return redirect()->route('products.index')->with('success', 'Товар успішно оновлено!');
    }

    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('destroy', $product);
        $this->productService->deleteProduct($product);

        return redirect()->route('products.index')->with('success', 'Товар успішно видалено!');
    }
}
