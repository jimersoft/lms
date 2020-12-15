<?php

namespace Cyaxaress\User\Tests\Feature;

use Cyaxaress\User\Models\User;
use Cyaxaress\User\Services\VerifyCodeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_see_register_from()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->registerNewUser();  //*** function to register user

        $response->assertRedirect(route('home'));

        $this->assertCount(1, User::all());

    }

    /** @return void */
    public function test_use_have_to_verify_account()
    {
        $this->registerNewUser();

        $response = $this->get(route('home'));

        $response->assertRedirect(route('verification.notice'));

    }

    public function test_user_can_verify_account()
    {
        $user=User::create(
            [
        'name' => 'Hamid',
            'email' => 'kurd.hamid@gmail.com',
            'password' => 'P@ssw0rd',
            ]
        ) ;
        $code=VerifyCodeService::generate();
        VerifyCodeService::store($user->id,$code);
        auth()->loginUsingId($user->id);
        $this->assertAuthenticated();
        $this->post(route('verification.verify'),['verify_code'=>$code]);
        $this->assertEquals(true,$user->fresh()->hasVerifiedEmail());
    }

    public function test_verified_user_can_see_home_page()
    {
        $this->registerNewUser();

        $this->assertAuthenticated();

        auth()->user()->markEmailAsVerified();

        $response = $this->get(route('home'));

        $response->assertOk();
    }

    public function registerNewUser()
    {
        return $this->post(route('register'), [
            'name' => 'Hamid',
            'email' => 'kurd.hamid@gmail.com',
            'mobile' => '9367853698',
            'password' => 'As25@#',
            'password_confirmation' => 'As25@#'
        ]);
    }




}
