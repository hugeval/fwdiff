# Configuration

## Links
1. [Symfony Configuration](https://symfony.com/doc/current/configuration.html)
2. [Laravel Configuration](https://laravel.com/docs/7.x#configuration)

## Steps
### Symfony Steps
1. Dev tools configuration
    1. Require friendsofphp/php-cs-fixer package
    1. Require phpmd/phpmd package
    1. Require phpstan/phpstan-symfony package
    1. Add @codeCoverageIgnore annotation for app/Kernel.php
1. Travis configuration
    1. Composer install script
    1. Ant build

### Laravel Steps
1. Dev tools configuration
    1. Require friendsofphp/php-cs-fixer package 
    1. Require phpmd/phpmd package
    1. Require phpstan/phpstan package
    1. Add @codeCoverageIgnore annotation for app/Console/Kernel.php
    1. Add @codeCoverageIgnore annotation for app/Exceptions/Handler.php
    1. Add @codeCoverageIgnore annotation for app/Http/*
    1. Add @codeCoverageIgnore annotation for app/Providers/*
    1. Fix phpstan notice for app/Http/Middleware/Authenticate.php
1. Travis configuration
    1. Composer install script
    1. App key generation script
    1. Create .env
    1. Ant build

## Conclusion
* Laravel requires more steps to configure dev tools
* There is friendsofphp/php-cs-fixer package which is actually is code sniffer for Symfony

## Score
* Symfony: 1
* Laravel: 0
