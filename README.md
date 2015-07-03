Membership
===============================

Installation
-------------

## Requirements

   Untuk mengetahui ketersediaan dukungan php dan setting webserver, jalankan perintah berikut di command prompt
   ```
   php requirements.php 
   ```
## Installing using Composer

Setelah composer di install, jalankan perintah berikut di command prompt:

    composer global require "fxp/composer-asset-plugin:~1.0.0"
    composer create-project --prefer-dist yiisoft/yii2-app-advanced yii-application

## Preparing application

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Execute the `init` command and select `dev` as environment.

   ```
   php /path/to/yii-application/init
   ```

   Otherwise, in production execute `init` in non-interactive mode.

   ```
   php /path/to/yii-application/init --env=Production --overwrite=All
   ```

2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.

   ```
   'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'pgsql:host=localhost;port=5432;dbname=membership',
        'username' => 'postgres',
        'password' => 'password',
        'charset' => 'utf8',
    ],
   ```
   Nama database, username dan password disesuaikan saja dengan settingan di lokal komputer masing-masing.

3. Jalankan console command `yii migrate`.

4. Set document roots of your web server:

   Lihat di : https://github.com/yiisoft/yii2-app-advanced/blob/master/docs/guide/start-installation.md