<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_home_returns_a_successful_response(): void
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
        $response->assertSee('home');
    }

    public function test_dashboard_returns_a_successful_response(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('dashboard');
    }
    public function test_index_returns_a_successful_response(): void
    {
        $response = $this->get('/index');
        $response->assertStatus(200);
        $response->assertSee('index');
    }
   
}
