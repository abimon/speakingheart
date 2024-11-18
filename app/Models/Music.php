<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable=[
        'path',
        'title',
        'composer',
        'content'
    ];
    public function comments(){
        return $this->hasMany(Mcomment::class, 'id', 'post_id');
    }
    public function likes(){
        return $this->hasMany(Mlike::class, 'id', 'post_id');
    }
    public function views(){
        return $this->hasMany(Mview::class, 'id', 'post_id');
    }
}
