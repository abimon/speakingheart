<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alike extends Model
{
    protected $fillable =[
        "user_ip",
        "post_id",
    ];
}