<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Wishlist;
use Auth;

class ThreadController extends Controller
{
    public function index()
    {

    }

    private function getUser()
    {
        return Auth::user();
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
            'harga'     => $request->harga,
            'kategori'  => $request->kategori
        ]);

        return redirect('member');
    }

    public function create()
    {
        return view('layouts.thread.create_thread');
    }

    public function cari($keyword)
    {
        $thread = Thread::where([['judul', 'like', '%'. $keyword .'%'], ['status', 1]])->paginate(15);

        $notifikasi = \App\Models\Notifikasi::where('user_id', $this->getUser()->id)->get();

        return view('layouts.thread.cari', ['thread' => $thread, 'notifikasi' => $notifikasi]);
    }

    public function blockThread($id)
    {
        $thread = Thread::find($id);
        $thread->status = 0;
        $thread->save();
    }

    /**
     * @param Request $request
     */
    public function validasiThread(Request $request)
    {
        $thread = Thread::find($request->id);
        $validasi = $request->validasi;

        if ($validasi == 'Validasi') {
            $thread->status = 1;
        } elseif ($validasi == 'Tolak') {
            $thread->delete();
        }
        $thread->save();

        return redirect('home');
    }

    public function lihatThread($id)
    {
        $thread = Thread::find($id)->with('wishlist')->first();
        $wishlist = Wishlist::where('thread_id', $id)->with('user')->get();
        $komentar = \App\Models\Komentar::where('thread_id', $id)->get();
        $notifikasi = null;
        if (getUser()) {
            $notifikasi = \App\Models\Notifikasi::where('user_id', $this->getUser()->id)->get();
        }

        return view('layouts.thread.thread_detail', ['thread' => $thread, 'wishlist' => $wishlist, 'notifikasi' => $notifikasi, 'komentar' => $komentar]);
    }

    public function lihatPendingThread($id)
    {
        $thread = Thread::where('id', $id)->first();
        $wishlist = Wishlist::where('thread_id', $id)->with('user')->get();
        $notifikasi = \App\Models\Notifikasi::where('user_id', $this->getUser()->id)->get();

        return view('layouts.thread.pending_thread_detail', ['thread' => $thread, 'wishlist' => $wishlist, 'notifikasi' => $notifikasi]);
    }

    public function allThread()
    {
        return Thread::all()->toJson();
    }

}
