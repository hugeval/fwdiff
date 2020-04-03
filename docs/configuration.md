# Configuration

## Links
1. [Symfony Configuration](https://symfony.com/doc/current/configuration.html)
2. [Laravel Configuration](https://laravel.com/docs/7.x#configuration)

## Steps
### Symfony Steps
1. Dev tools configuration
⋅⋅1. Require friendsofphp/php-cs-fixer package
..2. Require phpmd/phpmd package
..3. Require phpstan/phpstan-symfony package
..4. Add @codeCoverageIgnore annotation for app/Kernel.php

### Laravel Steps
1. Dev tools configuration
⋅⋅1. Require friendsofphp/php-cs-fixer package
..2. Require phpmd/phpmd package
..3. Require phpstan/phpstan package
..4. Add @codeCoverageIgnore annotation for app/Console/Kernel.php
..5. Add @codeCoverageIgnore annotation for app/Exceptions/Handler.php
..6. Add @codeCoverageIgnore annotation for app/Http/*
..7. Add @codeCoverageIgnore annotation for app/Providers/*
..8. Fix phpstan notice for app/Http/Middleware/Authenticate.php

## Conclusion
* Laravel requires more steps to configure dev tools
* There is friendsofphp/php-cs-fixer package which is actually is code sniffer for Symfony

## Score
* Symfony: 1
* Laravel: 0
