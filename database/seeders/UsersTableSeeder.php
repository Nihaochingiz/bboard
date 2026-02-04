<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Запуск сида
     */
    public function run(): void
    {
        // Очищаем таблицы (опционально)
        Bb::query()->delete();
        User::query()->delete();

        // 1. Создаем администратора
        $admin = User::create([
            'name' => 'Администратор',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
        ]);

        $this->command->info("Создан администратор:");
        $this->command->info("   Логин: admin@example.com");
        $this->command->info("   Пароль: admin");
        $this->command->info("   ID: {$admin->id}");

        // Создаем IT-объявления для администратора
        $adminAds = [
            [
                'title' => 'Системный блок игровой',
                'content' => 'Игровой системный блок на базе Intel Core i7, 32 ГБ RAM, видеокарта RTX 4070, SSD 1 ТБ, блок питания 750W. Сборка 2023 года.',
                'price' => 95000,
            ],
            [
                'title' => 'Ноутбук ASUS ROG Strix',
                'content' => 'Игровой ноутбук ASUS ROG Strix G15, процессор AMD Ryzen 7, 16 ГБ RAM, видеокарта RTX 3060, экран 15.6" 144 Гц, SSD 512 ГБ.',
                'price' => 85000,
            ],
            [
                'title' => 'Монитор Dell UltraSharp',
                'content' => 'Монитор Dell UltraSharp 27", разрешение 4K, матрица IPS, частота 60 Гц, поддержка HDR. Состояние отличное, гарантия 6 месяцев.',
                'price' => 25000,
            ],
            [
                'title' => 'Клавиатура механическая',
                'content' => 'Механическая клавиатура Keychron K8, переключатели Gateron Red, беспроводная, подсветка RGB, раскладка 75%. Новая в коробке.',
                'price' => 7500,
            ],
        ];

        foreach ($adminAds as $ad) {
            $bb = $admin->bbs()->create($ad);
            $this->command->info("   Создано объявление: «{$ad['title']}» (ID: {$bb->id})");
        }

        // 2. Создаем тестового пользователя
        $testUser = User::create([
            'name' => 'Тестовый Пользователь',
            'email' => 'test@example.com',
            'password' => Hash::make('test'),
            'email_verified_at' => now(),
        ]);

        $this->command->info("\nСоздан тестовый пользователь:");
        $this->command->info("   Логин: test@example.com");
        $this->command->info("   Пароль: test");
        $this->command->info("   ID: {$testUser->id}");

        // Создаем IT-объявления для тестового пользователя
        $testUserAds = [
            [
                'title' => 'Видеокарта NVIDIA RTX 3080',
                'content' => 'Видеокарта NVIDIA GeForce RTX 3080 10 ГБ, использовалась для майнинга 6 месяцев, работает стабильно, без разгона.',
                'price' => 45000,
            ],
            [
                'title' => 'Ноутбук MacBook Air M1',
                'content' => 'Ноутбук Apple MacBook Air с процессором M1, 8 ГБ RAM, SSD 256 ГБ, экран 13.3". Покупка 2022 год, состояние идеальное.',
                'price' => 75000,
            ],
            [
                'title' => 'Мышь игровая Logitech',
                'content' => 'Игровая мышь Logitech G Pro X Superlight, беспроводная, вес 63 г, сенсор Hero 25K. Использовалась 3 месяца, есть коробка.',
                'price' => 6000,
            ],
            [
                'title' => 'Планшет графический Wacom',
                'content' => 'Графический планшет Wacom Intuos Pro Medium, рабочая область 224x148 мм, 8192 уровня нажатия. Комплект полный.',
                'price' => 22000,
            ],
            [
                'title' => 'SSD диск Samsung 1 ТБ',
                'content' => 'SSD диск Samsung 970 EVO Plus 1 ТБ, интерфейс NVMe PCIe Gen3. Скорость чтения 3500 МБ/с, записи 3300 МБ/с. Новый.',
                'price' => 8500,
            ],
        ];

        foreach ($testUserAds as $ad) {
            $bb = $testUser->bbs()->create($ad);
            $this->command->info("   Создано объявление: «{$ad['title']}» (ID: {$bb->id})");
        }

        $this->command->info("\nГотово! Создано:");
        $this->command->info("   2 пользователя");
        $this->command->info("   9 объявлений");
    }
}