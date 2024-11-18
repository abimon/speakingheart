<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcomment extends Model
{
    protected $fillable =[
        "user_ip",
        "post_id",
        "comment"
    ];
}
