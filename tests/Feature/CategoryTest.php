<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_allcategories(){
        $response = $this->get('/api/admin/category/all');
        $response->assertStatus(200);
    }

    public function test_store()
    {
 
        $response = $this->post('/api/admin/category', [
            'category_name' => 'new category'
        ]);
        $response->assertStatus(201);
    }

    //test missing field to store category
    // public function test_missing_to_store(){
    //     $response = $this->withHeaders([
    //         '/'    =>  'Application/json'
    //     ])->post('/api/admin/category');
    //     $response->assertStatus(302);
    // }


    public function test_findCategory(){
        $response = $this->post('/api/admin/category/search', [
            'search_val' => 'testvalue'
        ]);
        $response->assertStatus(200);
    }

    public function test_update(){
    
        $response = $this->withHeaders([
                '/'    =>  'Application/json'
            ])->put('/api/admin/category/2', [
                'category_name' => 'new category'
            ]);
       
        $response->assertStatus(200);
    }


    public function test_delete(){
    
        $response = $this->withHeaders([
                '/'    =>  'Application/json'
            ])->delete('/api/admin/category/2');
       
        $response->assertStatus(200);
    }

}
