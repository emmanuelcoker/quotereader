<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\User;

class AuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_authors(){
        $user = User::factory()->create();
        $token = $user->createToken('Personal Access Token')->accessToken;
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                         ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->get('/api/authors/all');

        $response->assertStatus(200);
    }
    

    public function test_search_author(){
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
        $author = Author::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->post('/api/author/search', [
                            'search_val' => $author->author_name
                         ]);

        $response->assertStatus(200);
    }


    public function test_create_author(){
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
                         ->post('/api/admin/author/create', [
                            'author_name' => 'new author',
                            'about' => 'Write about the new author'
                         ]);

        $response->assertStatus(201);
    }

    public function test_unauthenticated_create_author(){
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
                         ->post('/api/admin/author/create', [
                            'author_name' => 'new author',
                            'about' => 'Write about the new author'
                         ]);

        $response->assertStatus(401);
    }

    public function test_unauthenticated_update_author(){
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
        $author = Author::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->put('/api/admin/author/'. $author->id, [
                            'author_name' => 'new author',
                            'about' => 'Write about the new author'
                         ]);

        $response->assertStatus(200);
    }

    public function test_update_author(){
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
        $author = Author::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->put('/api/admin/author/'. $author->id, [
                            'author_name' => 'new author',
                            'about' => 'Write about the new author'
                         ]);

        $response->assertStatus(200);
    }


    public function test_delete_author(){
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
        $author = Author::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->delete('/api/admin/author/'. $author->id);

        $response->assertStatus(200);
    }

    public function test_unauthenticated_delete_author(){
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
        $author = Author::factory()->create();
        $response = $this->withHeaders([
                            '/' => 'application/json',
                            'Authorization' => 'Bearer '.$token
                        ])
                         ->actingAs($user, 'api')
                         ->withSession(['banned' => false])
                         ->delete('/api/admin/author/'. $author->id);

        $response->assertStatus(401);
    }
}
