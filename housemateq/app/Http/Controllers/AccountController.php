<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {

            $notifikasi = \App\Models\Notifikasi::where('user_id', $user->id);

            if ($user->role == '1') {

                return redirect('admin');
            }

            return view('layouts.member.home', ['user' => $user, 'notifikasi' => $notifikasi]);
        }

        return view('auth.login');
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
