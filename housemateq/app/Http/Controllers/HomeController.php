<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Notifikasi;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thread = Thread::where('status', 1)->get();
        $notifikasi = null;

        if (Auth::user()) {
            $notifikasi = Notifikasi::where('user_id', Auth::user()->id)->get();
        }

        return view('home', ['thread' => $thread, 'notifikasi' => $notifikasi]);
    }
}
