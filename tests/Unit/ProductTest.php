<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\Api\ProductController;
use App\Models\Product;
use App\Models\Category;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_create()
    {
        $product=Product::create([
            'product_status' =>true,
            'product_name' => 'test1',
            'product_code' => 'test1',
            'product_stock' =>20,
            'product_price' => 1000,
            'category_id' => 1,
            'description' =>'test',
        ]);



        return $this->assertInstanceOf(Product::class,$product);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_belong_to_categorie()
    {
        $product=Product::first();
        return $this->assertInstanceOf(Category::class,$product->categories);
    }
}
