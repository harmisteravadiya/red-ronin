<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_request extends Model
{
    public $table="user_requests";
    public $timestamps=false;
    use HasFactory;
}
