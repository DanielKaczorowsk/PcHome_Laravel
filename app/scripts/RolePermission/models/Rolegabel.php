<?php
 
namespace App\scripts\RolePermission\models;

use App\scripts\RolePermission\models\Permission;
use Illuminate\Database\Eloquent\Model;
use 
 
class Rolegabel extends Pivot
{
    public function rolegabel()
    {
        return $this->morphTo();
    }
}
