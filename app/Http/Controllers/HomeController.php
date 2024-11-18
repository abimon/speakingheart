<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Aview;
use App\Models\Book;
use App\Models\Poetry;
use App\Models\Pview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::where('isPosted',true)->orderBy('created_at', 'desc')->get();
        return view('articles', compact('articles'));
    }
    public function dashboard()
    {
        if(Auth::user()->isAdmin){
            $pitems = Poetry::all();
            $aitems = Article::all();
            $books = Book::all();
        }
        else{
            $pitems = Poetry::where('user_id',Auth::user()->id)->get();
            $aitems = Article::where('user_id',Auth::user()->id)->get();
        }
        return view('dashboard.home',compact('pitems','aitems','books'));
    }
    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $new_key = uniqid() . '_' . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        $md_key = md5($new_key);

        if (!isset($_COOKIE['visitor_id' . ($article->id)])) {
            setcookie('visitor_id' . ($article->id), $md_key, time() + (86400 * 30), "/");
            $user_ip = $md_key;
        }
        else{
            $user_ip = $_COOKIE['visitor_id'. ($article->id)];
        }
        
        $view = Aview::where([['user_ip', $user_ip], ['post_id', $article->id]])->first();
        if (!$view) {
            Aview::create([
                'user_ip' => $user_ip,
                'post_id' => $article->id,
            ]);
        }
        return view('article', compact('article'));
    }
    public function poems(){
        $poems = Poetry::where('isPosted',true)->orderBy('created_at', 'desc')->get();
        return view('poems' ,compact('poems'));
    }
    public function poem($slug){
        $poem = Poetry::where('slug', $slug)->first();
        $new_key = uniqid() . '_' . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        $md_key = md5($new_key);

        if (!isset($_COOKIE['visitor_id' . ($poem->id)])) {
            setcookie('visitor_id' . ($poem->id), $md_key, time() + (86400 * 30), "/");
            $user_ip = $md_key;
        }
        else{
            $user_ip = $_COOKIE['visitor_id'.($poem->id)];
        }
        $view = Pview::where([['user_ip', $user_ip], ['post_id', $poem->id]])->first();
        if (!$view) {
            Pview::create([
                'user_ip' => $user_ip,
                'post_id' => $poem->id,
            ]);
        }
        return view('poem', compact('poem'));
    }
}

