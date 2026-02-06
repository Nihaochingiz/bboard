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
php artisan serve
```
# Работа с базой данных
```bash
# Установка sqlite
 sudo apt update
 sudo apt install php8.3-sqlite3
 sudo apt install php-sqlite3 sqlite3
 php -m | grep sqlite
php artisan migrate
sqlite3 database/database.sqlite
php artisan db:seed --class=UsersTableSeeder
php artisan migrate:fresh --seed
SELECT * FROM users;

# Получить спсиок объявлений
sqlite3 database/database.sqlite
SELECT * FROM bbs;



INSERT INTO users (name, email, password, created_at, updated_at) 
VALUES (
    'Имя Фамилия', 
    'user@example.com', 
    'хеш_пароля', 
    datetime('now'), 
    datetime('now')
);
 ```
# Данные для входа администратора
admin@example.com
admin



php artisan make:command CreateBb
```bash
# Осторожно, удаление проекта
rm -rf bboard/
```
