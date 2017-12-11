<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Wishlist;
use App\Models\Komentar;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendingThread = Thread::where('status', 0)->get();
        $komentar = Komentar::all();

        if ($user->role == '0') {
            return redirect('/member');
        }

        return view('layouts.admin.home', ['user' => $user, 'pendingThread' => $pendingThread, 'komentar' => $komentar]);
    }
}
