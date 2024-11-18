<?php

namespace App\Http\Controllers;

use App\Models\Pcomment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PcommentController extends Controller
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
        $user = Auth::user();
        if(!$user){
            $user = User::where('email', request('email'))->first();
            if(!$user){
                $user=User::create([
                    'name'=>request('name'),
                    'email'=>request('email'),
                    'password'=>Hash::make(uniqid())
                ]);
            }
        }
        Pcomment::create([
            'user_ip'=>$user->id,
            'comment'=>request('comment'),
            'post_id'=>request('post_id')
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pcomment $pcomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pcomment $pcomment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pcomment $pcomment)
    {
        //
    }
}
