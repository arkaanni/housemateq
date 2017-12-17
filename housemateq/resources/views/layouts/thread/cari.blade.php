@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container" style="margin-top: 5em">
        @foreach ($thread as $t)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $t->judul }}</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="{{ asset('images/housemate_q/big10105867.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Pemilik :</th>
                                        <td>
                                            <p>{{ $t->user->name }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi :</th>
                                        <td>
                                            <p>{{ $t->deskripsi }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kategori :</th>
                                        <td>
                                            <p>
                                                @if ($t->kategori == 0)
                                                    Mewah
                                                @elseif ($t->kategori == 1)
                                                    Luas
                                                @elseif ($t->kategori == 2)
                                                    Minimalis
                                                @elseif ($t->kategori == 3)
                                                    Sederhana
                                                @elseif ($t->kategori == 4)
                                                    Kecil
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga :</th>
                                        <td>
                                            <p>{{ $t->harga }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('/thread/'. $t->id) }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
