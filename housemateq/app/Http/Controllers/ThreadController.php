<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $validator = Validator::make($request, [
            'judul'         => 'required|min:6',
            'deskripsi'     => 'required|min:6',
            'harga'         => 'required',
            'kategori'      => 'required',
            'max_wishlist'  => 'required'
        ]);

        

        Thread::create([
            'user_id'       => $request->user_id,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'harga'         => $request->harga,
            'kategori'      => $request->kategori,
            'max_wishlist'  => $request->max_wishlist,
            'sisa_wishlist' => $request->max_wishlist
        ]);

        return redirect('member');
    }

    public function create()
    {

    }

    public function cari()
    {
        $notifikasi = null;
        if (Auth::user()) {
            $notifikasi = \App\Models\Notifikasi::where('user_id', Auth::user()->id)->get();
        }

        $key = Input::get('q');
        $thread = Thread::where([['judul', 'like', '%'. $key .'%'], ['status', 1]])->paginate(15);

        return view('layouts.thread.cari', ['thread' => $thread, 'notifikasi' => $notifikasi]);
    }

    public function filter($q)
    {
        $cat;

        if ($q == 'mewah') {$cat = 0;}
        else if ($q == 'luas') {$cat = 1;}
        else if ($q == 'minimalis') {$cat = 2;}
        else if ($q == 'sederhana') {$cat = 3;}
        else if ($q == 'kecil') {$cat = 4;}
        else {abort(404);}

        $thread = Thread::where('kategori', $cat)->with('user')->get();
        $notifikasi = null;
        if (Auth::user()) {
            $notifikasi = \App\Models\Notifikasi::where('user_id', Auth::user()->id)->get();
        }

        return view('layouts.thread.cari', ['thread' => $thread, 'notifikasi' => $notifikasi]);
    }

    public function blockThread($id)
    {
        if (Thread::find($id)) {
            if (Auth::user()->role == 1) {

                $thread = Thread::find($id);
                $thread->status = 0;
                $thread->save();

                return redirect('admin');

            } else {
                return redirect('home');
            }
        } else {
            abort(404);
        }
    }

    /**
    * @param Request $request
    */
    public function validasiThread(Request $request)
    {
        // dd($request);
        if (Auth::user()->role == 1) {
            $thread = Thread::find($request->id);
            $validasi = $request->validasi;

            if ($validasi == 'Validasi') {
                $thread->status = 1;
            } elseif ($validasi == 'Tolak') {
                $thread->delete();
            }

            $thread->save();

            return redirec('admin');

        } else {
            return redirect('home');
        }
    }

    public function lihatThread($id)
    {
        $thread = Thread::find($id);
        if ($thread) {
            $wishlist = Wishlist::where('thread_id', $id)->with('user')->get();
            $komentar = \App\Models\Komentar::where('thread_id', $id)->get();
            $notifikasi = null;

            if (Auth::user()) {
                $notifikasi = \App\Models\Notifikasi::where('user_id', Auth::user()->id)->get();
            }

            return view('layouts.thread.thread_detail', ['thread' => $thread, 'wishlist' => $wishlist, 'notifikasi' => $notifikasi, 'komentar' => $komentar]);
        } else {
            abort(404);
        }
    }

    public function lihatPendingThread($id)
    {
        $thread = Thread::where([['id', $id], ['status', 0]])->first();
        $wishlist = null;
        $notifikasi = null;

        if ($thread) {
            if (Auth::user()->role == 1) {
                if ($thread->status == 1) {
                    return redirect('admin');
                }
                $wishlist = Wishlist::where('thread_id', $id)->with('user')->get();
                $notifikasi = \App\Models\Notifikasi::where('user_id', Auth::user()->id)->get();
            } else {
                abort(500);
            }
            return view('layouts.thread.pending_thread_detail', ['thread' => $thread, 'wishlist' => $wishlist, 'notifikasi' => $notifikasi]);
        } else {
            abort(404);
        }
    }

    public function allThread()
    {
        return Thread::all();
    }
}
