<?php
namespace App\scripts\RolePermission\methods\search;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\scripts\RolePermission\trait\search;
use App\scripts\RolePermission\methods\SearchRolePermission;
use App\scripts\RolePermission\models\Role;

    class SearchUser extends SearchRolePermission
    {
        private $user;
        public function has_table()
        {
            $this->Records = Role::with('user','permission')->whereRelation('user', 'name', '=', $this->data)->get();
            return $this->Records;
        }
        public function one_table($table)
        {
            if($table==='role')
            {
             $this->Records = Role::with('user')->where('name',$this->data)->get();
            }
            elseif($table==='permission')
            {
             $this->Records = Role::with('permission')->whereRelation('user', 'name', '=', $this->data)->get();
            }
            return $this->Records;
        }
          public function all_table()
        {
            $this->Records = Role::with('user','permission')->paginate(10);
            return $this->Records;
        }
        use search;
    }
?>

