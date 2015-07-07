Membership
===============================

Kontribusi
-----------
Jika anda ingin berkontribusi dalam pembangunan aplikasi ini, berikut langkah-langkahnya : 

1. Fork repository ini dan ikuti [Panduan Penggunaan Git](docs/guide-id/git-workflow.md).
   Ikuti langkah-langkah instalasi dan test runing aplikasi ini, pastikan berjalan dengan baik.

2. Lihat [Sitemap dan Design Pattern Aplikasi](docs/guide-id/app-design-pattern.md)
   dan tentukan bagian yang akan ditangani / di-pick dengan membuat issue akan mempick bagian itu
   untuk meminimkan konflik.


Installation
-------------

## Requirements

   Untuk mengetahui ketersediaan dukungan php dan setting webserver, jalankan perintah berikut di command prompt
   ```
   php requirements.php 
   ```
   Pastikan PDO PostgreSQL extension dengan status OK, Jika masih warning dapat mengaktifkan extension PDO PostgreSQL melalui file php.ini .

## Installing using Composer

Setelah composer di install, jalankan perintah berikut di command prompt:

    composer global require "fxp/composer-asset-plugin:~1.0.0"
    composer install

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

4. Setting document roots dari web server anda :

   Lihat di : [Panduan Instalasi](docs/guide/start-installation.md)

5. Lakukan konfigurasi username dan password email anda pada file `common\config\main-local.php`
   
Progress Summary
----------------
### Database design & Models
* [ERD](docs/guide-id/app-database-erd.md)

1.0 Initiation version - http://git.io/vq3Ta

1. users
2. profiles
3. educations
3. skills
4. experiences
5. portfolios

### Pages / Area / Feature
1. Page to show a member's basic profile (1.0 Initiation version - http://git.io/vq3Ta)
