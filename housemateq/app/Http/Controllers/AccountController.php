<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == '1') {
            return redirect('admin');
        }

        return view('layouts.member.home', ['user' => $user]);
    }

    public function lihatBiodata()
    {

    }

    public function myAccount()
    {

    }

    public function blockAccount()
    {

    }
}
