<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poetry extends Model
{
    protected $fillable =[
        'user_id',
        'cover',
        'title',
        'content',
        'isPosted',
        'slug'
    ];
    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Pcomment::class, 'post_id', 'id');
    }
    public function likes(){
        return $this->hasMany(Plike::class, 'post_id', 'id');
    }
    public function views(){
        return $this->hasMany(Pview::class, 'post_id', 'id');
    }
}
