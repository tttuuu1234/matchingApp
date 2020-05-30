<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * テストが実行される前に最初に行われる
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    /**
     * @test
     */
    public function loginしていない時のuser登録form表示()
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function loginしていない時のuser登録処理()
    {
        $response = $this->post('register',[
            'email' => 'aaa@aaa.com',
            'password' => 'qqq12345',
            'password_confirmation' => 'qqq12345'
        ]);

        // home画面にリダイレクト
        $response->assertRedirect('/home');
    }


}
