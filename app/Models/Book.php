<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'path',
        'title',
        'author',
    ];
    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
