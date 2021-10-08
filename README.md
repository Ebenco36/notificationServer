<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



## How to Use

<p>Create your database</p>
<p>Set the .env config</p>
<p>Run php artisan migrate</p>
<p>Run php artisan serve --port=8000</p>

<p>This is the Webhook Server</p>
<p>Endpoints</p>


```
http://127.0.0.1:8000/publish/topic

{
    "data": {
        "message": "You are welcome to my world"
    }
}

http://127.0.0.1:8000/subscribe/topic
{
    "url": "http://127.0.0.1:8000/test2"
}
```


