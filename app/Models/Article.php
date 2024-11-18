<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'cover',
        'title',
        'content',
        'isPosted',
    ];
    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Acomment::class, 'post_id', 'id');
    }
    public function likes(){
        return $this->hasMany(Alike::class, 'post_id', 'id');
    }
    public function views(){
        return $this->hasMany(Aview::class, 'post_id', 'id');
    }
}
