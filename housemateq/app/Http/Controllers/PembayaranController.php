<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PembayaranController extends Controller
{
    public function index($wishlist_id)
    {
        $user = Auth::user();

        if ($user) {
            $wishlist = \App\Models\Wishlist::find($wishlist_id);

            $banks = \App\Models\Bank::all();

            $notifikasi = \App\Models\Notifikasi::where('user_id', $user->id)->get();

            if ($wishlist) {
                $wishlist = \App\Models\Wishlist::find($wishlist_id)->with('thread')->first();
                $thread = \App\Models\Thread::find($wishlist->thread->id);
                $jumlah = $thread->harga/$thread->max_wishlist;

                return view('layouts.pembayaran.bayar', ['banks' => $banks, 'thread' => $thread, 'wishlist' => $wishlist, 'notifikasi' => $notifikasi, 'jumlah' => $jumlah]);
            } else {
                abort(404);
            }
        } else {
            return redirect('login');
        }
    }

    public function bayar(Request $request)
    {
        $user = Auth::user();
        // dd($request->thread_id);
        if ($user) {
            $invoice = \App\Models\Pembayaran::create([
                'thread_id' => $request->thread_id,
                'user_id'   => $user->id,
                'status'    => 0,
                'bank_id'   => $request->pilih_bank,
                'jumlah'    => $request->jumlah,
            ]);

            if ($invoice) {
                return view('layouts.pembayaran.sukses');
            }
        }
    }
}
