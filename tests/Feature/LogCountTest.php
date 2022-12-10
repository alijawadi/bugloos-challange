<?php

namespace Tests\Feature;

use App\Models\Log;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LogCountTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_log_count_api()
    {
        Log::factory(10)->create();

        $response = $this->get('/logs/count');
        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json->has('count'));
    }
}
