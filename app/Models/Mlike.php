<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mlike extends Model
{
    protected $fillable =[
        "user_ip",
        "post_id",
    ];
}
