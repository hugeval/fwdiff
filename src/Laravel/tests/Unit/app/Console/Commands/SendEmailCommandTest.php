<?php

namespace Tests\Unit\App\Console\Commands;

class SendEmailCommandTest extends \Tests\TestCase
{
    public function testHandle()
    {
        $this->artisan(
            'app:send-email',
            [
                'from' => 'user1@mailinator.com',
                'to' => 'user2@mailinator.com',
                'subject' => 'test',
                'body' => 'body',
            ]
        )
            ->assertExitCode(0);;
    }
}
