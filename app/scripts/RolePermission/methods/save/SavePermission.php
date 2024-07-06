<?php
namespace App\scripts\RolePermission\obj;


    class SavePermission extends RolePermission
    {
        public function createpermission()
        {
            $this->Role = Role::where('role',$this->data)
			                    ->get();
        }
        public function SavePermissionToRole()
        {
           
        }
    }
