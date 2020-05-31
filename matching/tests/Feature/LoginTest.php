<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    /**
     * @test
     */
    public function loginしていない時のloginForm表示()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    // public function loginしていない時のlogin処理()
    // {
    //     $user = new User();
    //     $a = $user->find(1);

    //     $response = $this->post('login',[
    //         'email' => $a->email,
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
    //     ]);

    //     $response->assertRedirect('/home');
    // }

    /**
     * @test
     */
    public function login時のlogout処理()
    {
        $user = Auth::loginUsingId(1);
        //認証状態にする
        $this->actingAs($user);
        $this->assertTrue(Auth::check());
        $response = $this->get('logout');

        // loginページに遷移
        $response->assertRedirect('login');
    }
}
