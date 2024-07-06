<?php
namespace App\scripts\RolePermission\methods\search;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\scripts\RolePermission\trait\search;
use App\scripts\RolePermission\methods\SearchRolePermission;

    class SearchRole extends SearchRolePermission
    {
        private $user;
        public function hastable()
        {
            $this->Records = Role::with('user','permission')->where('role',$this->data);
        }
        public function one_table($table)
        {
            if($table==='permission')
            {
             $this->Records = Role::with('permission')->where('name',$this->data);
            }
            elseif($table==='user')
            {
             $this->Records = Role::with('user')->where('name',$this->data);
            }
            return $this->Records;
        }
        use search;
    }
?>

