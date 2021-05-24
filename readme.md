Данный проект использует фреймворк Laravel 5.7.29 версии.
Рекомендуется использовать XAMPP с версии PHP не выше 7.4, инача возникнут ошибки.

### 1. Устанавливаем XAMPP:
   `https://www.apachefriends.org/download.html`

### 2. В файле xampp\apache\conf\extra\httpd-vhosts.conf добавляем:

```
## Laravel Main Project
<VirtualHost *:80>
    ServerAdmin webmaster@laravel.local
    DocumentRoot "D:/xampp/htdocs/laravel/public"
    ServerName laravel.local
    <Directory /xampp/htdocs/laravel/public>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order Allow,Deny
        Allow from all
    </Directory>
    ErrorLog "logs/laravel-error.log"
    CustomLog "logs/laravel-access.log" common
</VirtualHost>`
```

### 3. В хостах Windows пописываем:
    127.0.0.1  laravel.local

### 4. Устанавливаем Laravel через Git в папку htdocs\laravel:
   `git clone https://github.com/Mysteltainn66/studyLaravel.git`

### 5. Устанавливаем плагин "Laravel" для PhpStorm (File/Setting.../Plugins)

### 6. Устанавливаем через терминал Laravel IDE Helper :
   `composer require --dev barryvdh/laravel-ide-helper=v2.7`

### 7. Устанавливаем Laravel Debugbar:
   `composer require --dev barryvdh/laravel-debugbar=v3.4`

### 8. Для создания создания таблицы и админ аккаунта пропишите в консоли:
   `php artisan migrate --seed`
