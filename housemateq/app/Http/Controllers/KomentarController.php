<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function index()
    {

    }

    public function addKomentar($id, Request $request)
    {
        Komentar::create([
            'thread_id' => $id,
            'user_id'   => $request->user_id,
            'value'     => $request->komentar
        ]);

        return redirect(url()->previous());
    }

    public function getKomentar($threadId)
    {
        $komentar = Komentar::find($threadId);

        return $komentar;
    }

    public function hapusKomentar($id)
    {
        $komentar = Komentar::find($id)->delete();

        return redirect('admin');
    }
}
