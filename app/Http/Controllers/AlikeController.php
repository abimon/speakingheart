<?php

namespace App\Http\Controllers;

use App\Models\Alike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlikeController extends Controller
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
    public function store()
    {
        $new_key = uniqid() . '_' . gethostbyaddr($_SERVER["REMOTE_ADDR"]);
        $md_key = md5($new_key);
        
        if (!isset($_COOKIE['visitor_id' . (request('post_id'))])) {
            setcookie('visitor_id' . (request('post_id')), $md_key, time() + (86400 * 30), "/");
        }
        $user_ip= $_COOKIE['visitor_id' . (request('post_id'))];
        $view = Alike::where([['user_ip', $user_ip], ['post_id', request('post_id')]])->first();
            if (!$view) {
                Alike::create([
                    'user_ip' => $user_ip,
                    'post_id' => request('post_id'),
                ]);
            }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Alike $alike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alike $alike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alike $alike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alike $alike)
    {
        //
    }
}
