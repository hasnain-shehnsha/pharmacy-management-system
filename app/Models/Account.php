<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends  Authenticatable
{
    protected $fillable=['email', 'password'];
}
