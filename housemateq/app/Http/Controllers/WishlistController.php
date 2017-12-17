<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function index()
    {

    }

    public function lihatWishlist($idThread)
    {
        $wishlist = Wishlist::where('thread_id', $idThread)->get();

        return $wishlist;
    }

    /**
     * @param Request $request
     */
    public function daftarWishlist($id, Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $thread = Thread::find($id);
            // dd($thread);

            if ($thread) {
                $wishlist = Wishlist::create([
                    'thread_id' => $id,
                    'user_id'   => $user->id,
                ]);

                $user->status = $request->status;
                $user->save();

                $thread->sisa_wishlist = $thread->sisa_wishlist - 1;
                $thread->save();
            }
            return redirect(url()->previous());
        } else {
            abort(404);
        }
    }
}
