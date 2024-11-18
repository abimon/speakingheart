<?php

namespace App\Http\Controllers;

use App\Models\Plike;
use Illuminate\Http\Request;

class PlikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_key = uniqid() . '_' . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        $md_key = md5($new_key);
        
        if (!isset($_COOKIE['visitor_id' . (request('post_id'))])) {
            setcookie('visitor_id' . (request('post_id')), $md_key, time() + (86400 * 30), "/");
        }
        $user_ip= $_COOKIE['visitor_id' . (request('post_id'))];
        $view = Plike::where([['user_ip', $user_ip], ['post_id', request('post_id')]])->first();
            if (!$view) {
                Plike::create([
                    'user_ip' => $user_ip,
                    'post_id' => request('post_id'),
                ]);
            }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Plike $plike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plike $plike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plike $plike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plike $plike)
    {
        //
    }
}
