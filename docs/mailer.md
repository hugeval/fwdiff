# Mailer

## Links
1. [Symfony Mailer](https://symfony.com/doc/current/components/mailer.html)
2. [Laravel Mail](https://laravel.com/docs/7.x/mail)

## Steps
### Symfony Steps
1. Require symfony/google-mailer package.
2. Set MAILER_DSN at .env. Only username and password for gmail is required.
3. Inject Symfony\Component\Mailer\MailerInterface
4. Instantiate Symfony\Component\Mime\Email. Set from, to, subject, text.
5. Call Symfony\Component\Mailer\MailerInterface::send()

### Laravel Steps
1. Set MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION at .env.
2. Create App\Mail\DemoEmail. The purpose is assignment of data: from.address, from.name, subject, viewData.body.
3. Create Tests\Unit\App\Mail\DemoEmailTest. 
4. Create resources/views/emails/demo_email.blade.php
5. Inject Illuminate\Contracts\Mail\Mailer. Could be replaced with facade to avoid DI configuration via constructor. 
6. Instantiate App\Mail\DemoEmail.
7. Configure $mailable
8. Call Illuminate\Contracts\Mail\Mailer::to()
9. Call Illuminate\Contracts\Mail\Mailer::send()

## Conclusion
* Laravel requires more steps to send simple email.
* Laravel requires more code and files to send simple.
* Symfony requires additional package to send simple email.
* Laravel requires more env vars configuration.

## Score
* Symfony: 1
* Laravel: 0
