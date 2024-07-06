<?php
 
namespace App\scripts\RolePermission\models;
 
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'write',
        'read',
        'edit'
    ];
}
