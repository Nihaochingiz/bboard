<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BbsController extends Controller
{
    public function index() {
    $bbs = Bb::latest()->get();
    
    // Для веб-страницы
    return view('index', ['bbs' => $bbs]);
    
    // Если нужно сохранить и текстовый вывод тоже:
    $s = "Объявления \r\n\r\n";
    foreach ($bbs as $bb) {
        $s .= $bb->title . "\r\n";
        $s .= $bb->price . " руб.\r\n";
        $s .= "\r\n";
    }
    
    // Текстовый вывод для определенных типов запросов
    if (request()->wantsJson() || request()->is('api/*')) {
        return response($s)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }
    
    return view('index', ['bbs' => $bbs]);
}

    public function detail($id) {
        $bb = Bb::find($id);
        
        if (!$bb) {
            return response("Объявление не найдено\r\n")
                ->header('Content-Type', 'text/plain; charset=utf-8')
                ->setStatusCode(404);
        }
        return view('detail', ['bb' => $bb]);
}}