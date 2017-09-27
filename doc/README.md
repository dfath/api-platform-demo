# README

## Instalasi
```bash
$ php -v # cek versi php
$ composer -v # cek versi composer
$ composer list # lihat semua command
$ composer search <keyword> # cari library
$ composer create-project api-paltform/api-paltform <nama-project> # install api-paltform
$ composer install # install dependencies
$ php bin/console list # lihat semua command di dalam framework
```

## Konfigurasi
- ubah routes
- matikan http cache/varnish

## Buat Bundle
```bash
$ php bin/console doctrine:database:drop --force # hapus database
$ php bin/console doctrine:database:create # buat database
$ php bin/console generate:bundle --namespace=Suteki/Siakad/AcmeBundle # buat bundle baru
$ php bin/console doctrine:generate:entity --entity=AcmeBundle:Menu
$ php bin/console doctrine:schema:update --force # update schema
$ php bin/console doctrine:schema:validate # validasi schema
```

## Fixtures
```bash
$ composer require doctrine/doctrine-fixtures-bundle # install fixtures
$ composer require fzaninotto/faker --dev # installl data dummy
```
