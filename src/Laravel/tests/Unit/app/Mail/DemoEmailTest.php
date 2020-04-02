<?php

namespace Tests\Unit\App\Mail;

use PHPUnit\Framework\TestCase;

use App\Mail\DemoEmail;

class DemoEmailTest extends TestCase
{
    public function testBuild()
    {
        $mailable = new DemoEmail();
        $this->assertNotEmpty($mailable->build());
    }
}
