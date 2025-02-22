[![Latest Version](https://img.shields.io/github/release/mr4-lc/laravel-email-audit-log)](https://github.com/mr4-lc/laravel-email-audit-log/releases)
[![Issues](https://img.shields.io/github/issues/mr4-lc/laravel-email-audit-log)](https://github.com/mr4-lc/laravel-email-audit-log/issues)
[![Stars](https://img.shields.io/github/stars/mr4-lc/laravel-email-audit-log)](hhttps://github.com/mr4-lc/laravel-email-audit-log/stargazers)

## Laravel Email Audit Log

This service provider will monitor all emails that has been sent out of your system. Sent emails will be stored in email_audit_log table. 

Any feedback / enhancement request is more than welcome!

## Help and docs

We use GitHub issues only to discuss bugs and new features. For support please refer to:

- [Laravel Documentation](http://laravel.com)
- [Laravel Stack Overflow](http://stackoverflow.com/questions/tagged/laravel)
- [Author's Linkdin](https://www.linkedin.com/in/aleksandar-djokic-713339167)

## Installing Laravel Audit Log

The recommended way to install Laravel Audit Log is through
[Composer](https://getcomposer.org/).

```bash
composer require mr4-lc/laravel-email-audit-log
```


## Publishing migrations
Lets publish package migrations

```
php artisan vendor:publish --tag=email-audit-log-migrations 
```

## Migrating database
```
php artisan migrate
```


## Usage and reports
There is already aliased eloquent model
```php
use mr4-lc\LaravelEmailAuditLog\Models\EmailAudit;

EmailAudit::all(); //Will return collection of models
```


