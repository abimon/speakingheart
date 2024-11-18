<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->isAdmin){
            $items = Article::orderBy('created_at', 'desc')->get();
        }
        else{
            $items = Article::orderBy('created_at', 'desc')->where('user_id',Auth::user()->id)->get();
        }
        return view('dashboard.articles.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Article::where('title',request('title'))->first()){
            if(request()->hasFile('cover')){
                $extension = request()->file('cover')->getClientOriginalExtension();
                $path = uniqid() . time() . '.' . $extension;
                request()->file('cover')->storeAs('/articles', $path);
            }
            Article::create([
                "cover" => $path,
                "title" => request("title"),
                "slug"=>Str::slug(request('title'),'_'),
                "content" => request("content"),
                "isPosted" => request("isPosted"),
            ]);
            return redirect()->route('posts.index')->with('success','Article created successfully.');
        }
        return back()->withInput()->with('error','An article with this title already exist');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Article::findOrFail($id);
        return view('dashboard.articles.edit',compact('post'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $post = Article::findOrFail($id);
        if(request()->hasFile('cover')){
            $extension = request()->file('cover')->getClientOriginalExtension();
            $path = uniqid() . time() . '.' . $extension;
            request()->file('cover')->storeAs('/articles', $path);
            $post->cover = $path;
        }
        if(request('title')!=null){
            $post->title=request('title');
            $post->slug = Str::slug(request('title'), '_');
        }
        if(request('content')!=null){
            $post->content=request('content');
        }
        if(request('isPosted')!=null){
            $post->isPosted=request('isPosted');
        }
        $post->update();
        return redirect()->route('posts.index')->with('success','Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
