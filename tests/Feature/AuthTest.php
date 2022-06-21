<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_valid_email(){
        $username = Str::random(10);
        $response = $this->withHeaders([
                '/'     =>  'Application/json'
            ])->post('/api/auth/register', [
                'name' => $username,
                'email' => $username.'example.com',
                'password'=> 'password'
            ]);

        $response->assertStatus(302);
    }
 
    public function test_register(){
        $username = Str::random(10);
        $response = $this->withHeaders([
                '/'     =>  'Application/json'
            ])->post('/api/auth/register', [
                'name' => $username,
                'email' => $username.'@example.com',
                'password'=> 'password'
            ]);

        $response->assertStatus(200);
    }

    public function test_login(){
        $username = Str::random(10);
        $user = User::factory()->create([
            'name' => $username,
            'email' => $username.'@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/auth/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);
        $response->assertStatus(200);
    }
}
