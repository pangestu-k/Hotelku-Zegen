<h1>Hotelku.com App</h1>
<h6 class="text-gray">Created by Muhammad Rizky Pangestu</h6>

## Detail Aplikasi

Sebuah Aplikasi Reservasi Hotel yang dibuat untuk mempermudah baik dari sisi pengguna ataupun pengelola hotel.

<h3>Tata Cara Install 🌱</h3> 

- composer install
- copy file .env.example lalu ubah menjadi .env / gunakan perintah cp .env.example .env
- php artisan key:generate 
- Buat Database di mysql atau postgree (postgree ada konfigurasi sendiri)
- Tulis nama Database di file .env (sesuaikan dengan nama db yg dibuat)
    
    
    // jika menggukan database mysql
    <p>DB_CONNECTION=mysql</p>
    <p>DB_HOST=127.0.0.1</p>
    <p>DB_PORT=3306</p>
    <p>DB_DATABASE=hotelku</p>
    <p>DB_USERNAME=root</p>
    <p>DB_PASSWORD=</p>
    
    
    
    // jika menggukan database postgree sql
    <p>DB_CONNECTION=pgsql</p>
    <p>DB_HOST=127.0.0.1</p>
    <p>DB_PORT=5432</p>
    <p>DB_DATABASE=hotelku</p>
    <p>DB_USERNAME=postgres</p>
    <p>DB_PASSWORD=root</p>
    
    

- php artisan migrate --seed

<h6 class="text-gray">Email (admin) : admin@gmail.com</h6>
<h6 class="text-gray">Password	    : password</h6>

Youtube : <a href="https://www.youtube.com/watch?v=LDdB7Rb3DX8&ab_channel=MuhammadRizkyPangestu" target="_blank">Demo Aplikasi</a>


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
