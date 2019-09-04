<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $userData = [
            'name' => 'Sebastian',
            'email' => 'seba@seba.com',
            'password' => '123456'
        ];

        $user = new User($userData);

        $user->save();

        $this->assertDatabaseHas('users', $userData);
    }
}
