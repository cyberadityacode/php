<?php

/** 
 * Method Overriding:
 * When a child class redefines a method from its parent class.
 */

class WP_User
{
    public function get_role()
    {
        return "subscriber";
    }
}

class WP_Admin_User extends WP_User
{
    public function get_role()
    {
        return "administrator";
    }    
}

$admin = new WP_Admin_User();
echo $admin->get_role();
