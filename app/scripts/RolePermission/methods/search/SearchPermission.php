<?php
namespace App\scripts\RolePermission\methods\search;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\scripts\RolePermission\trait\search as search;
use App\scripts\RolePermission\methods\SearchRolePermission;
use App\scripts\RolePermission\models\Role;
    class SearchPermission extends SearchRolePermission
    {
        private $user;
        public function has_table()
        {
            $this->Records = Role::with('permission','user')->whereRelation('permission', 'name', '=', $this->data)->get();
            return $this->Records;
        }
        public function one_table($table)
        {
            if($table==='role')
            {
            $this->Records = Role::with('permission')->whereRelation('permission', 'name', '=', $this->data)->get();
            }
            elseif($table==='user')
            {
            $this->Records = Role::with('user')->whereRelation('permission', 'name', '=', $this->data)->get();
            }
            return $this->Records;
        }
        use search;
        
    }
?>

