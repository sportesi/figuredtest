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
        $response->assertSee('Register');
    }

    public function testLoginPingTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('E-Mail Address');
        $response->assertSee('Password');
        $response->assertSee('Remember Me');
        $response->assertSee('Forgot Your Password?');
    }

    public function testRegisterTest()
    {
        $response = $this->post('/register', [
            'name' => 'sebastian',
            'email' => 'seba@seba.com',
            'password' => '123123',
            'password_confirmation' => '123123'
        ]);

        $response->assertRedirect('/home');
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

        $response->assertRedirect('/home');
    }
}
