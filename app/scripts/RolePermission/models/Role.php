<?php
 
namespace App\scripts\RolePermission\models;

use App\scripts\RolePermission\models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
 
class Role extends Model
{
    public function Permission()
    {
        return $this->morphedByMany(Permission::class, 'rolegables');
    }
    public function User()
    {
        return $this->morphedByMany(User::class,'rolegables');
    }
}
