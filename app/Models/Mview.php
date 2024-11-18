<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mview extends Model
{
    protected $fillable =[
        "user_ip",
        "post_id",
    ];
}
