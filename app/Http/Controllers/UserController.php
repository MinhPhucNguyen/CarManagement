<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAccount()
    {
        return view('client.account.account_layout');
    }

    public function showMyFavs()
    {
        return view('client.account.myfavs_content');
    }

    public function showResetPw()
    {
        return view('client.account.resetpw_content');
    }
}
