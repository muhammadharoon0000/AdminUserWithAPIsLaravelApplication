<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    use HasFactory;

    function userRole()
    {
        return $this->belongsToMany(UserRole::class, 'user_role_permissions', 'premission', 'user_role');
    }
}
