<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
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

    public function test_register(){
        $response = $this->withHeaders([
                '/'     =>  'Application/json'
            ])->post('/api/auth/register', [
                'name' => 'test user',
                'email' => 'test@gmail.com',
                'password'=> 'password'
            ]);

        $response->assertStatus(200);
    }
}
