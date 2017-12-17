<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // dd(Auth::user());
        if ($user) {

            $notifikasi = \App\Models\Notifikasi::where('user_id', $user->id)->get();
            $wishlist = \App\Models\Wishlist::where('user_id', $user->id)->with('thread', 'user')->first();
            $thread = \App\Models\Thread::where('user_id', $user->id)->get();

            if ($user->role == '1') {

                return redirect('admin');
            }

            return view('layouts.member.home', ['user' => $user, 'notifikasi' => $notifikasi, 'wishlist' => $wishlist, 'thread' => $thread]);

        } else {
            return redirect('login');
        }
    }

    public function lihatBiodata($id)
    {
        return view('layouts.member.profile');
    }

    public function myAccount()
    {
        $user = Auth::user();

        if ($user){
            $notifikasi = \App\Models\Notifikasi::where('user_id', $user->id)->get();

            return view('layouts.member.profile', ['user' => $user, 'notifikasi' => $notifikasi]);
        }
    }

    public function blockAccount()
    {

    }
}
