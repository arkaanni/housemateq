@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container" style="margin-top: 4em; width: 100%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $thread->judul }}</h1>
                <br>
                <div class="row">
                    <div class="col-md-8" style="height: 300px;">
                        <div id="carousel-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" style="width: 100%; height: 300px;">
                                <div class="item active">
                                    <img src="{{ asset('images/housemate_q/big10105867.jpg') }}" alt="">
                                    <div class="carousel-caption">

                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/housemate_q/desain-rumah-kontrakan-kost-petak.jpg') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('images/housemate_q/polisi-gerebek-rumah-kontrakan_20170328_144953.jpg') }}" alt="">
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4" id="wishlist-container" style="overflow: auto;">
                        {{-- <h5 class="text-center">Wishlist</h5> --}}
                        <table class="table">
                            <thead>
                                <th class="text-center">Wishlist</th>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $t)
                                    <tr>
                                        <td> <a href="#">{{ $t->user->name }}</a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-8">
                        <br>
                        <h4>Deskripsi</h4>
                        <div class="panel">
                            <div class="panel-body">
                                <p class="caption">{{ $thread->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding: 0">
                        <br>
                        <form action="{{ url('/api/thread/'.$thread->id.'/daftar-wishlist') }}" method="post">
                            {{ csrf_field() }}
                            @if (Auth::user())
                                @if (Auth::user()->role == 1)
                                    <p class="text-muted text-center">Admin tidak bisa masuk wishlist.</p>
                                @else
                                    <input class="btn btn-primary" type="submit" name="btn_masuk_wishlist" value="Masuk Wishlist">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endif
                            @else
                                <h4 class="text-muted">Anda harus <a href="{{ url('login') }}"> Login </a>s terlebih dahulu.</h4>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-8">

                        <h4>Komentar</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @foreach ($komentar as $k)
                                    <p><strong>{{ $k->user->name }}:</strong> {{ $k->value }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form class="" action="{{ url('/api/thread/'. $thread->id. '/kirim-komentar') }}" method="post">
                            {{ csrf_field() }}
                            @if (Auth::user())
                                <textarea class="form-control input-lg" type="text" name="komentar" placeholder="Berikan komentar Anda.." style="resize: none"></textarea>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Kirim">
                            @else
                                <h4 class="text-muted"> <a href="{{ url('login') }}"> Login </a>untuk memberikan komentar.</h4>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
