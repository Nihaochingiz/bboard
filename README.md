# Laravel Bboard - Доска объявлений

Простой проект доски объявлений на Laravel с использованием SQLite.

## Требования

- PHP 8.1 или выше
- Composer
- SQLite3
- Laravel 10.x

## Старт

### 1. Клонирование репозитория

```bash
git clone https://github.com/Nihaochingiz/bboard.git
cd bboard
```

### 2. Настройка окружения

```bash
# Установка зависимостей Composer
composer install

# Копирование файла окружения
cp .env.example .env

# Генерация ключа приложения
php artisan key:generate
```

### 3. Настройка базы данных

```bash
# Установка SQLite (для Ubuntu/Debian)
sudo apt update
sudo apt install php8.3-sqlite3 sqlite3

# Проверка установки SQLite
php -m | grep sqlite

# Создание файла базы данных SQLite
touch database/database.sqlite
```

### 4. Конфигурация базы данных в .env

Откройте файл `.env` и настройте подключение к SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/bboard/database/database.sqlite
```

### 5. Миграции и сиды

```bash
# Выполнение миграций
php artisan migrate

# Заполнение базы данных тестовыми данными
php artisan db:seed
```

### 6. Запуск приложения

```bash
# Запуск локального сервера
php artisan serve

# Приложение будет доступно по адресу:
# http://localhost:8000
```

## Учетные записи по умолчанию

После выполнения сидов будут созданы следующие пользователи:

### Администратор
- **Email:** admin@example.com
- **Пароль:** admin

### Обычный пользователь
- **Email:** user@example.com
- **Пароль:** password

## Структура базы данных

### Основные таблицы

1. **users** - Пользователи системы
2. **bbs** - Объявления
3. **password_reset_tokens** - Токены сброса пароля
4. **sessions** - Сессии пользователей

### Просмотр данных через SQLite

```bash
# Открыть консоль SQLite
sqlite3 database/database.sqlite

# Просмотреть все таблицы
.tables

# Просмотреть пользователей
SELECT * FROM users;

# Просмотреть объявления
SELECT * FROM bbs;

# Выйти из консоли SQLite
.exit
```

## Функциональность

### Основные возможности

1. **Просмотр объявлений** - Главная страница со списком всех объявлений
2. **Детальный просмотр** - Страница с полной информацией об объявлении
3. **Аутентификация** - Система входа и регистрации
4. **Управление пользователями** - CRUD операции для пользователей

### Маршруты

- `GET /` - Главная страница со списком объявлений
- `GET /bbs/{bb}` - Детальная страница объявления
- `GET /login` - Страница входа
- `GET /register` - Страница регистрации

## Разработка

### Artisan команды

```bash
# Создание новой модели с миграцией и контроллером
php artisan make:model ModelName -mc

# Создание нового контроллера
php artisan make:controller ControllerName

# Создание сидера
php artisan make:seeder SeederName

# Запуск всех сидеров
php artisan db:seed

# Сброс и повторное выполнение миграций с сидами
php artisan migrate:fresh --seed
```

### Полезные команды

```bash
# Просмотр всех маршрутов
php artisan route:list

# Очистка кэша
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Генерация документации (если установлен пакет)
php artisan ide-helper:generate
```

## Тестирование

```bash
# Запуск тестов PHPUnit
php artisan test

# Запуск конкретного теста
php artisan test --filter TestName
```

## Структура проекта

```
bboard/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── BbsController.php
│   ├── Models/
│   │   ├── Bb.php
│   │   └── User.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── database.sqlite
├── public/
├── resources/
│   └── views/
├── routes/
│   └── web.php
└── tests/
```

## Безопасность

### Рекомендации по безопасности

1. **Перед развертыванием в production:**
   - Измените пароли по умолчанию
   - Настройте надежные секретные ключи
   - Включите HTTPS
   - Настройте файрвол и ограничьте доступ

2. **Для SQLite в production:**
   - Установите соответствующие права доступа к файлу базы данных
   - Регулярно создавайте резервные копии
   - Рассмотрите переход на PostgreSQL или MySQL для production

## Устранение неполадок

### Распространенные проблемы

1. **Ошибка с SQLite:**
   ```bash
   # Проверьте установку расширения SQLite
   php -m | grep sqlite
   
   # Если не установлено
   sudo apt install php-sqlite3
   sudo systemctl restart apache2  # или nginx/php-fpm
   ```

2. **Ошибки миграции:**
   ```bash
   # Сбросить миграции
   php artisan migrate:fresh
   ```

3. **Проблемы с правами доступа:**
   ```bash
   # Установите правильные права
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

## Лицензия

Этот проект является учебным и может быть использован в образовательных целях.

## Вклад в проект

Для внесения изменений:

1. Форкните репозиторий
2. Создайте ветку для вашей функции (`git checkout -b feature/amazing-feature`)
3. Зафиксируйте изменения (`git commit -m 'Add some amazing feature'`)
4. Запушьте в ветку (`git push origin feature/amazing-feature`)
5. Откройте Pull Request
