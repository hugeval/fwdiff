<?php

namespace App\Tests\Command;

use App\Command\SendEmailCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;

class SendEmailCommandTest extends TestCase
{
    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var SendEmailCommand
     */
    protected $command;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->mailer = $this->getMockBuilder(MailerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->command = new SendEmailCommand($this->mailer);
        $this->input = $this->getMockBuilder(InputInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->output = $this->getMockBuilder(OutputInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testRun()
    {
        $this->input->expects($this->at(4))
            ->method('getArgument')
            ->willReturn('sender@mailinator.com');
        $this->input->expects($this->at(5))
            ->method('getArgument')
            ->willReturn('receiver@mailinator.com');
        $this->input->expects($this->at(6))
            ->method('getArgument')
            ->willReturn('Some Subject');
        $this->input->expects($this->at(7))
            ->method('getArgument')
            ->willReturn('Some Message');
        $this->command->run($this->input, $this->output);
    }
}
