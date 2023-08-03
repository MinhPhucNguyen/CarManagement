<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAccount()
    {
        return view('client.account.account_content');
    }

    public function showMyFavs()
    {
        return view('client.account.myfavs_content');
    }

    public function showChangePw()
    {
        return view('client.account.changepw_content');
    }
}
