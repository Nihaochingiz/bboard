<?php

namespace App\Console\Commands;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Console\Command;

class CreateBb extends Command
{
    protected $signature = 'bb:create 
                            {title : Название объявления}
                            {content : Описание объявления}
                            {price : Цена}
                            {--user-id= : ID существующего пользователя (по умолчанию первый пользователь)}
                            {--count=1 : Количество объявлений для создания}';

    protected $description = 'Создать объявление для существующего пользователя';

    public function handle()
    {
        // Получаем пользователя
        $user = $this->getUser();
        
        if (!$user) {
            $this->error('❌ Не найден ни один пользователь в базе данных!');
            $this->line('Сначала создайте пользователя:');
            $this->line('  php artisan tinker');
            $this->line('  >>> $user = new App\Models\User();');
            $this->line('  >>> $user->name = "Администратор";');
            $this->line('  >>> $user->email = "admin@example.com";');
            $this->line('  >>> $user->password = bcrypt("password");');
            $this->line('  >>> $user->save();');
            return 1;
        }

        $this->info("👤 Используем пользователя: {$user->name} (ID: {$user->id})");

        // Создаем указанное количество объявлений
        $count = (int)$this->option('count');
        $createdAds = [];

        for ($i = 1; $i <= $count; $i++) {
            // Если создаем несколько объявлений, добавляем номер к заголовку
            $title = $count > 1 
                ? $this->argument('title') . " #{$i}"
                : $this->argument('title');

            try {
                $bb = $user->bbs()->create([
                    'title' => $title,
                    'content' => $this->argument('content'),
                    'price' => $this->argument('price'),
                ]);

                $createdAds[] = [
                    'id' => $bb->id,
                    'title' => $bb->title,
                    'price' => $bb->price,
                ];
                
            } catch (\Exception $e) {
                $this->error("❌ Ошибка при создании объявления #{$i}: " . $e->getMessage());
            }
        }

        if (empty($createdAds)) {
            $this->error('❌ Не удалось создать ни одного объявления!');
            return 1;
        }

        $this->info("\n✅ Успешно создано " . count($createdAds) . " объявление(й)");
        
        // Выводим таблицу с результатами
        $headers = ['ID', 'Название', 'Цена', 'Ссылка'];
        $rows = [];
        
        foreach ($createdAds as $ad) {
            $rows[] = [
                $ad['id'],
                $ad['title'],
                $ad['price'] . ' руб.',
                url("/{$ad['id']}/")
            ];
        }
        
        $this->table($headers, $rows);
        
        $this->info("\n🎉 Объявления успешно созданы для пользователя: {$user->name}");
        
        return 0;
    }

    /**
     * Получить пользователя из базы данных
     */
    private function getUser()
    {
        // Если указан ID пользователя
        if ($userId = $this->option('user-id')) {
            $user = User::find($userId);
            if ($user) {
                return $user;
            } else {
                $this->warn("⚠️ Пользователь с ID {$userId} не найден. Используем первого пользователя.");
            }
        }

        // Всегда используем первого пользователя из базы
        $user = User::first();
        
        if (!$user) {
            // Пробуем создать пользователя по умолчанию
            return $this->createDefaultUser();
        }
        
        return $user;
    }

    /**
     * Создать пользователя по умолчанию (только если база пустая)
     */
    private function createDefaultUser()
    {
        try {
            $user = User::create([
                'name' => 'Администратор',
                'email' => 'admin_' . time() . '@example.com',
                'password' => bcrypt('password'),
            ]);
            
            $this->info("✅ Автоматически создан пользователь по умолчанию: {$user->name}");
            $this->info("📧 Email: {$user->email}");
            $this->info("🔑 Пароль: password");
            
            return $user;
        } catch (\Exception $e) {
            $this->error("❌ Не удалось создать пользователя по умолчанию: " . $e->getMessage());
            return null;
        }
    }
}