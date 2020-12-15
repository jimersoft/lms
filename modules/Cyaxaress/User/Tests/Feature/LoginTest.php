<?php

namespace Cyaxaress\User\Tests\Feature;

use Cyaxaress\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_by_email()
    {
       $user=User::create([
           'name'=> $this->faker->name,
        'email'=>$this->faker->safeEmail,
        'password'=>bcrypt('A123a!a12')

       ]);
       $this->post(route('login'),[
           'email'=>$user->email,
           'password'=>'A123a!a12'
       ]);
       $this->assertAuthenticated();
    }

    public function test_user_can_login_by_mobile()
    {
        $user=User::create([
            'name'=> $this->faker->name,
            'email'=>$this->faker->safeEmail,
            'mobile'=>'9188713525',
            'password'=>bcrypt('A123a!a12')

        ]);
        $this->post(route('login'),[
            'email'=>$user->mobile,
            'password'=>'A123a!a12'
        ]);
        $this->assertAuthenticated();
    }


}
