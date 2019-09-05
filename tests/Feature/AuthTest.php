<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function testRegisterPingTest()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function testLoginPingTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function testRegisterTest()
    {
        $response = $this->post('/register', [
            'name' => 'sebastian',
            'email' => 'seba@seba.com',
            'password' => '123123',
            'password_confirmation' => '123123'
        ]);

        $response->assertRedirect('/');
    }

    public function testLoginTest()
    {
        $user = new User([
            'name' => 'Sebastian',
            'email' => 'seba@seba.com',
            'password' => bcrypt('123456')
        ]);

        $user->save();

        $response = $this->post('/login', [
            'email' => 'seba@seba.com',
            'password' => '123456'
        ]);

        $response->assertRedirect('/');
    }
}
