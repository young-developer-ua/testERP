<?php

namespace App\Services;

use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductService
{
    public function createProduct(CreateRequest $createRequest): Product
    {
        return Product::create([
            'name' => $createRequest->name,
            'description' => $createRequest->description,
            'price' => $createRequest->price,
            'user_id' => auth()->id(),
        ]);
    }

    public function updateProduct(UpdateRequest $updateRequest, Product $product): Product
    {
        $product->name = $updateRequest->name;
        $product->description = $updateRequest->description;
        $product->price = $updateRequest->price;
        $product->save();

        return $product;
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }

    public function getUserProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::where('user_id', auth()->id())->get();
    }
}
