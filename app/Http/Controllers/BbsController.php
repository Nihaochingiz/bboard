<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BbsController extends Controller
{
    public function index() {
        $bbs = Bb::latest()->get();
        $s = "Объявления \r\n\r\n";
        foreach ($bbs as $bb) {
            $s .= $bb->title . "\r\n";
            $s .= $bb->price . " руб.\r\n";
            $s .= "\r\n";
        }
        return response($s)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    public function detail($id) {
        $bb = Bb::find($id);
        
        if (!$bb) {
            return response("Объявление не найдено\r\n")
                ->header('Content-Type', 'text/plain; charset=utf-8')
                ->setStatusCode(404);
        }
        
        $s = $bb->title . "\r\n\r\n";
        $s .= $bb->content . "\r\n";
        $s .= $bb->price . " руб.\r\n";
        
        return response($s)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }
}