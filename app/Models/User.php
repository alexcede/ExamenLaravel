<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use  HasFactory, AuthenticatableTrait;

    public $timestamps = false;
    protected $table = 'users';

    protected $fillable = ['nick', 'password'];
}
