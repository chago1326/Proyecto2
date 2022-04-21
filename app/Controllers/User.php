<?php

namespace App\Controllers;

class User extends BaseController
{
    public function register()
    {
        $data['pageTitle'] = 'User Signup';
        $content = view('user/register');
        return parent::renderTemplate($content, $data);
    }

    public function login()
    {
        $data['pageTitle'] = 'User Login';
        $content = view('user/login');
        return parent::renderTemplate($content, $data);
    }
}