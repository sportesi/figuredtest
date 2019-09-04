<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PingTest extends TestCase
{
    /**
     * @return void
     */
    public function testPingTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Figured Test');
        $response->assertSee('Login');
        $response->assertSee('Register');
    }
}
