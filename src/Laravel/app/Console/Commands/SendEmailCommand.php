<?php

namespace App\Console\Commands;

use App\Mail\DemoEmail;
use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;

class SendEmailCommand extends Command
{
    protected const ARGUMENT_FROM = 'from';
    protected const ARGUMENT_TO = 'to';
    protected const ARGUMENT_SUBJECT = 'subject';
    protected const ARGUMENT_BODY = 'body';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email';

    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->signature = sprintf(
            'app:send-email {%s} {%s} {%s} {%s}',
            self::ARGUMENT_FROM,
            self::ARGUMENT_TO,
            self::ARGUMENT_SUBJECT,
            self::ARGUMENT_BODY
        );
        parent::__construct();
        $this->mailer = $mailer;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mailable = new DemoEmail();
        $mailable->from[] = [
            'address' => $this->argument(self::ARGUMENT_FROM),
            'name' => null,
        ];
        $mailable->subject = $this->argument(self::ARGUMENT_SUBJECT);
        $mailable->viewData['body'] = $this->argument(self::ARGUMENT_BODY);
        $this->mailer->to($this->argument(self::ARGUMENT_TO))
            ->send($mailable);
    }
}
