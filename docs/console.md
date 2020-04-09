# Console

## Links
1. [Symfony Mailer](https://symfony.com/doc/current/components/console.html)
2. [Laravel Mail](https://laravel.com/docs/7.x/artisan)

## Steps
### Symfony Steps
1. Create `App\Command\SendEmailCommand`, using `./bin/console make:command SendEmail`. 
1. Create `App\Tests\Command\SendEmailCommandTest`.

### Laravel Steps
1. Create `App\Console\Commands\SendEmailCommand`, using `./artisan make:command SendEmailCommand`.
1. Create `Tests\Unit\App\Console\Commands\SendEmailCommandTest`, using `make:test SendEmailCommandTest`.

## Conclusion
* Symfony console command definition is more explicit.
* Laravel provides console command for code generation.
* Laravel test for console command is more simple and therefore more maintainability one.

## Score
* Symfony: 1
* Laravel: 1
