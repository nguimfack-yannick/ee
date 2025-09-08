<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Tu peux renvoyer une vue appelée "news.blade.php"
        return view('news');
    }
}

