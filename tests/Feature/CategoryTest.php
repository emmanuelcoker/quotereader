<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;

class CategoryTest extends TestCase
{
    /** 
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this-> get('/');

    //     $response->assertStatus(200);
    // }

    public function test_allcategories(){
        $user = User::factory()->create();
        $token = $user->createToken('Personal Access Token')->accessToken;
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                         ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         
                         ->get('/api/category/all');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->post('/api/admin/category/create', [
                            'category_name' => 'new category'
                         ]);

        $response->assertStatus(201);
    }

    //test not admin user cannot store
    public function test_unauthenticated_to_store(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->post('/api/admin/category/create', [
                            'category_name' => 'new category'
                         ]);

        $response->assertStatus(401);
    }


    public function test_findCategory(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        $category = Category::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->post('/api/category/search', [
                            'search_val' => $category->category_name
                         ]);

        $response->assertStatus(200);
    }

    public function test_update_category(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        $category = Category::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->put('/api/admin/category/'.$category->id, [
                            'category_name' => 'updated category'
                         ]);

        $response->assertStatus(200);
    }


    public function test_unauthenticated_update(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        $category = Category::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->put('/api/admin/category/'.$category->id, [
                            'category_name' => 'updated category'
                         ]);

        $response->assertStatus(401);
    }

    public function test_delete(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        $category = Category::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->delete('/api/admin/category/'.$category->id);

        $response->assertStatus(200);
    }

    public function test_unauthenticated_delete(){
        $username = Str::random(14);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);
        $token = $user->createToken('Personal Access Token')->accessToken;
        $category = Category::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->delete('/api/admin/category/'.$category->id);

        $response->assertStatus(401);
    }

}
