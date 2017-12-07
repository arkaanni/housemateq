@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container-fluid">
                {{-- <div class="page-header"> --}}
                    <h4>Selamat Datang di</h4>
                    <h1><strong>Housemate Q</strong></h1>
                {{-- </div> --}}
                <h4>Housemate Q merupakan platform untuk mencari teman kontrakan secara online.</h4>
                <div style="margin-top: 16em">
                    <a href="#main" class="btn btn-primary" style="padding: 1em 2em;">Mulai</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="main">
                @foreach ($thread as $t)
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                          <img src="{{asset('images/housemate_q/desain-rumah-kontrakan-kost-petak.jpg')}}" alt="">
                        </a>

                        <div class="caption">
                            <a href="{{ url('/thread/'. $t->id) }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection
