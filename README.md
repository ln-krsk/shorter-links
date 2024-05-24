<p align="center">
<img src="public/img/img-shorter-links-two-liner.png" alt="shorter Links logo">
</p>

## About shorter links

Shorter Links is a short link management tool that allows you to create, manage and track short links.

In addition, it is possible to create QR codes for the short links.

It is built with Laravel 10 and filament v3.


## Local Installation

**Make sure you have **[DDEV](https://ddev.readthedocs.io/en/latest/users/install/ddev-installation/)** properly installed.**

**clone gitlab repository:** 

``git clone git@github.com:ln-krsk/shorter-links.git``


**run:**
```
cp .env.example .env 

ddev start 

ddev artisan key:generate 

ddev artisan migrate:fresh --seed
```

## Daily usage

`ddev start`

`ddev phpmyadmin`   (visual database tool)

`ddev launch -m`    (mailing tool)




**linting:**

`ddev exec "./vendor/bin/php-cs-fixer fix --dry-run --diff"` 

`ddev exec "./vendor/bin/php-cs-fixer fix"`



### Included Packages


- **[filament](https://filamentphp.com/docs/)**
- **[chiiya/filament-access-control](https://github.com/chiiya/filament-access-control/)**
- **[lara-zeus/qr](https://github.com/lara-zeus/qr)**
- **[PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)**
