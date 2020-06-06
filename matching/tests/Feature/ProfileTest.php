<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    /**
     * @test
     */
    public function loginしている状態でprofileページにアクセス()
    {
        $user = Auth::loginUsingId(1);
        $this->actingAs($user);
        $response = $this->get('/profile');

        $response->assertStatus(200);
    }

}
