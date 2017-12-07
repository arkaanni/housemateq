<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Wishlist;

class ThreadController extends Controller
{
    public function index()
    {

    }

    /**
     * @param Request $request
     *
     */
    public function createThread(Request $request)
    {
        Thread::create([
            'user_id'   => $request->user_id,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori'  => $request->kategori
        ]);
    }

    public function create()
    {
        return view('layouts.thread.create_thread');
    }

    public function blockThread($id)
    {
        $thread = Thread::find($id);
        $thread->status = 3;
        $thread->save();
    }

    public function validasiThread($id)
    {
        $thread = Thread::find($id);
        $thread->status = 1;
        $thread->save();
    }

    public function lihatThread($id)
    {
        $thread = Thread::find($id)->with('wishlist')->first();
        $wishlist = Wishlist::where('thread_id', $id)->with('user')->get();
        return view('layouts.thread.thread_detail', ['thread' => $thread, 'wishlist' => $wishlist]);
    }

    public function allThread()
    {
        return Thread::all()->toJson();
    }
}
