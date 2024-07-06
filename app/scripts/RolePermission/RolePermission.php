<?php
namespace App\scripts\RolePermission;
use App\scripts\RolePermission\controller\search_controller as controller;

        class RolePermission 
        {
            private $data,$method;
            public function __construct($data)
            {
                $this->data = $data;
                $this->method = new controller($this->data);
                    //$this->method = new controller/save_controller(this->data);
            }
            public function permission($table)
            {
                $this->method = $this->method->permission($table);
                return $this->method;
            }
            public function role($table)
            {
                $this->method = $this->method->role($table);
                return $this->method;
            }
            public function user($table)
            {
                $this->method = $this->method->user($table);
                return $this->method;
            }
        }
?>
