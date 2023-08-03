<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class User extends Model  implements Illuminate\Contracts\Auth\Authenticatable
class User extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;
    function userRole()
    {
        return $this->belongsTo(UserRole::class, 'user_id');
    }

    public function isAdmin()
    {
        return $this->userRole()->where('name', 'Admin')->exists() ? true : false;
    }
}
