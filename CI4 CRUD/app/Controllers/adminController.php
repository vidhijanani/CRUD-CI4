<?php

namespace App\Controllers;

class adminController extends BaseController
{
    public function index(): string
    {
        return view('admin/login');
    }
     public function signup(): string
    {
        return view('admin/register');
    }
}
