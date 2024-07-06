<?php
namespace App\scripts\RolePermission\methods;


    abstract class SearchRolePermission implements interface_RolePermission
    {
        public $data;
        public function __construct($data)
        {
            $this->data = $data;
        }
        abstract public function get();
        
    }

?>
