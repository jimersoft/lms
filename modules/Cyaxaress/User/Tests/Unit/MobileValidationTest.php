<?php

namespace  Cyaxaress\User\Tests\Unit;

use Cyaxaress\User\Rules\ValidMobile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_can_not_be_less_10_character()
    {

        $result=(new ValidMobile())->passes('','918871352');
        $this->assertEquals(0,$result);
    }

    public function test_mobile_can_not_be_more_10_character()
    {

        $result=(new ValidMobile())->passes('','91887135251');
        $this->assertEquals(0,$result);
    }

    public function test_mobile_should_start_by_9()
    {

        $result=(new ValidMobile())->passes('','391887135251');
        $this->assertEquals(0,$result);
    }
}
