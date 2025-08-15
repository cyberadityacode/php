<?php

/**
 * Summary of WP_User_Base
 * Inheritance allows a class (child) 
 * to take properties and methods from another class (parent).
 */
class WP_User_Base
{
    public $username;
    public $email;

    /**
     * Summary of login
     * 
     * @return void
     */
    public function login()
    {
        echo "{$this->username} logged in";
    }
}

/**
 * WP_Admin_User
 */

class WP_Admin_User extends WP_User_Base
{
    public function delete_post($post_id)
    {
        echo "Post $post_id deleted by {$this->username}";
    }
}

$admin = new WP_Admin_User();
$admin->username = "aditya";
$admin->login();
$admin->delete_post(10);
