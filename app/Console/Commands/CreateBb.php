<?php

namespace App\Console\Commands;

use App\Models\Bb;
use Illuminate\Console\Command;

class CreateBb extends Command
{
    protected $signature = 'bb:create 
                            {title : Название объявления}
                            {content : Описание объявления}
                            {price : Цена}';

    protected $description = 'Создать новое объявление';

    public function handle()
    {
        $bb = Bb::create([
            'title' => $this->argument('title'),
            'content' => $this->argument('content'),
            'price' => $this->argument('price'),
        ]);

        $this->info("Объявление создано! ID: {$bb->id}");
        return 0;
    }
}
