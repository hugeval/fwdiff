<?php

namespace Tests\Unit\App\Http\Controllers;

class LoginControllerTest extends \Tests\TestCase
{
    public function testRedirectToProvider()
    {
        $response = $this->call('GET', 'login/google');
        $this->assertNotEmpty($response);
    }

    public function testHandleProviderCallback()
    {
        $response = $this->call('GET', 'login/check-google');
        $this->assertNotEmpty($response);
    }
}
