<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendEmailCommand extends Command
{
    protected const ARGUMENT_FROM = 'from';
    protected const ARGUMENT_TO = 'to';
    protected const ARGUMENT_SUBJECT = 'subject';
    protected const ARGUMENT_BODY = 'body';

    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * @var string
     */
    protected static $defaultName = 'app:send-email';

    /**
     * {@inheritdoc}
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Sends email')
            ->setHelp('This command allows you to send email')
            ->addArgument(
                self::ARGUMENT_FROM,
                InputArgument::REQUIRED,
                'From email address'
            )
            ->addArgument(
                self::ARGUMENT_TO,
                InputArgument::REQUIRED,
                'To email address'
            )
            ->addArgument(
                self::ARGUMENT_SUBJECT,
                InputArgument::REQUIRED,
                'Email subject'
            )
            ->addArgument(
                self::ARGUMENT_BODY,
                InputArgument::REQUIRED,
                'Email body'
            );
    }

    /**
     * @return int
     *
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = (new Email())
            ->from($input->getArgument(self::ARGUMENT_FROM))
            ->to($input->getArgument(self::ARGUMENT_TO))
            ->subject($input->getArgument(self::ARGUMENT_SUBJECT))
            ->text($input->getArgument(self::ARGUMENT_BODY));
        $this->mailer->send($email);
        $output->writeln('Email has been send');

        return 0;
    }
}
