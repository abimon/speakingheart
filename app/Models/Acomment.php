<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acomment extends Model
{
    protected $fillable =[
        "user_ip",
        "post_id",
        "comment"
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_ip', 'id');
    }
}
