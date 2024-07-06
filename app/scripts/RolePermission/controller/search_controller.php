<?php
namespace App\scripts\RolePermission\controller;
use App\scripts\RolePermission\methods\search;

    class search_controller 
    {
        private $data,$permission,$role,$user;
        public function __construct($data)
        {
                $this->data = $data;
                $this->permission = new search\SearchPermission($this->data);
                $this->role = new search\SearchRole($this->data);
                $this->user = new search\SearchUser($this->data);
        }
        public function permission($search)
        {
            if($search === 'has_table')
            {
               $this->permission =  $this->permission->has_table();
               return $this->permission;
            }
            elseif($search === 'one_table_role')
            {
                $this->permission =  $this->permission->one_table('role');
                return $this->permission;
            }
            elseif($search === 'one_table_user')
            {
                $this->permission =  $this->permission->one_table('user');
                return $this->permission;
            }
            elseif($search === 'all_table')
            {
                $this->permission =  $this->permission->all_table();
                return $this->permission;
            }
        }
        public function role($search)
        {
            if($search === 'has_table')
            {
                $this->role = $this->role->has_table();
                return $this->role;
            }
            elseif($search === 'one_table_permission')
            {
                $this->role = $this->role->one_table('permission');
                return $this->role;
            }
            elseif($search === 'one_table_role')
            {
                $this->role = $this->role->one_table('role');
                return $this->role;
            }
            elseif($search === 'one_table_user')
            {
                $this->role = $this->role->one_table('user');
                return $this->role;
            }
            elseif($search === 'all_table')
            {
                $this->role = $this->role->all_table();
                return $this->role;
            }
        }
        public function user($search)
        {
            if($search === 'has_table')
            {
                $this->user = $this->user->has_table();
                return $this->user;
            }
            elseif($search === 'one_table_permission')
            {
                $this->user = $this->user->one_table('permission');
                return $this->user;
            }
            elseif($search === 'one_table_role')
            {
                $this->user = $this->user->one_table('role');
                return $this->user;
            }
            elseif($search === 'all_table')
            {
                 $this->user = $this->user->all_table();
                 return $this->user;
            }
        }
    }
?>

