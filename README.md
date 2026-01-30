# Загрузка репозитория
```bash
git clone https://github.com/Nihaochingiz/bboard
cd bboard
code .
```
```bash
# Установка зависимостей composer
composer install 
cp .env.example .env 
php artisan key:generate
php artisan migrate
php artisan serve
```
```bash
# Установка sqlite
 sudo apt update
 sudo apt install php-sqlite3 sqlite3
 php -m | grep sqlite
 sqlite3 database/database.sqlite# bboard
 ```



```bash
# Осторожно, удаление проекта
rm -rf bboard/
```
