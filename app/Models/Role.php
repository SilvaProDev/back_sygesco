<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;
class Role extends Model
{
    use HasFactory;
    protected $fillable =["code", "libelle"];

    public function users(){
        return $this->belongsToMany(User::class, "users_roles");
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function allRolePermissions()
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
