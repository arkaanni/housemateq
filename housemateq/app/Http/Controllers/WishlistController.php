<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thread;
use App\Models\Wishlist;

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
    public function daftarWishlist(Request $request)
    {
        $wishlist = Wishlist::create([
            'thread_id' => $request->thread_id,
            'user_id'   => $request->user_id
        ]);

        return $wishlist->toJson();
    }
}
