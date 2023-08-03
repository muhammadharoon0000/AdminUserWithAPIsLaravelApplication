<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    function permission()
    {
        return $this->belongsToMany(Permission::class, 'user_role_permissions', 'user_role', 'premission');
    }
}
