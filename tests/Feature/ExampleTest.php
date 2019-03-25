<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    /**
     * Test listing all products
     *
     * @return void
     */
    public function testProductList()
    {
       // first generate some products
       // pass the product class to factory
       // we are creating 3 products

       $products = factory(\App\Product::class, 3)->create();

       $this->get(route('products.index'))
            ->assertStatus(200);

    // SEE JSON IS RETURNING AN ERROR

    //    array_map(function($product){
    //        // loop through the entire product array and investigate them
    //        // serialize each product
    //        $this->seeJson($product->jsonSerialize());
    //    }, $products->all());
    }

    public function testProductDescriptionList()
    {
        // create one product
        $product = factory(\App\Product::class)->create();
        // create many descriptions
        // descriptions returns the relationship

        // create saves to the db
        // make saves inmemory
        $product->descriptions()->saveMany(factory(\App\Description::class, 3)->make());

        $this->get(route('products.descriptions.index', ['products' => $product->id]))
            ->assertStatus(200);
    }

    public function testProductCreation()
    {
        $product = factory(\App\Product::class)->make(['name'=>'beets']);
        $this->post(route('products.store'), $product->jsonSerialize())
            //  ->seeInDatabase('products', ['name'=>$product->name])
             ->assertStatus(201);
    }
}
