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
 sqlite3 database/database.sqlite
 php artisan migrate
 ```

# Запуск консоли laravel
php artisan bb:create "Шкаф" "Совсем новый" 2000

```bash
$bb = App\Models\Bb::create([
    'title' => 'Тестовый заголовок',
    'content' => 'Тестовое описание',
    'price' => 1500,
]);

// Теперь переменная $bb доступна
echo $bb->id;

$bb = App\Models\Bb::create([
    'title' => 'Пылесос',
    'content' => "Старый, ржавый, без шланга",
    'price' => 1000,
]);

// Теперь переменная $bb доступна
echo $bb->id;

```
--- 


php artisan make:command CreateBb
```bash
# Осторожно, удаление проекта
rm -rf bboard/
```
