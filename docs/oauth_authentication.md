# Oauth Authentication

## Links
1. [Symfony Oauth Authentication](https://symfony.com/doc/current/security.html#a-authentication-firewalls)
1. [Laravel Oauth Authentication](https://laravel.com/docs/7.x/socialite)

## Steps
### Symfony Steps
1. Require `php-http/guzzle6-adapter` package.
1. Require `php-http/httplug-bundle` package with receipt.
1. Require `hwi/oauth-bundle` `dev-master` package with receipt.
1. Modify configuration fix appearing error due to oauth_user_provider and user provider.
1. Configure env vars.
1. Configure the routing.
1. Configure resource owners.
1. Configure the security layer.
1. Modify view to render link.

### Laravel Steps
1. Require `laravel/socialite` package.
1. Configure env vars.
1. Configure the routing.
1. Create controller
1. Modify view to render link.

## Conclusion
* Symfony requires more steps to configure oauth authentication.
* Symfony requires more packages to configure oauth authentication.
* Laravel configuration is significantly easier.

## Score
* Symfony: 0
* Laravel: 1
