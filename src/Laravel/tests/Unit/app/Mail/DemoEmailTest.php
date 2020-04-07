<?php

namespace Tests\Unit\App\Mail;

use App\Mail\DemoEmail;
use PHPUnit\Framework\TestCase;

class DemoEmailTest extends TestCase
{
    public function testBuild()
    {
        $mailable = new DemoEmail();
        $this->assertNotEmpty($mailable->build());
    }
}
