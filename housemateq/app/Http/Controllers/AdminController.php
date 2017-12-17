<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Wishlist;
use App\Models\Komentar;
use App\Models\Notifikasi;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $pendingThread = Thread::where('status', 0)->get();
            $komentar = Komentar::all();
            $notifikasi = Notifikasi::where('user_id', $user->id)->get();

            if ($user->role == '0') {
                return redirect('/member');
            }

            return view('layouts.admin.home', ['user' => $user, 'pendingThread' => $pendingThread, 'komentar' => $komentar, 'notifikasi' => $notifikasi]);
        } else {
            return redirect('login');
        }
    }
}
