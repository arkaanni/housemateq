@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container" style="margin-top: 3em">
        <div class="panel panel-default">
          @foreach ($thread as $t)
              <div class="panel-body">
                  <h2>{{ $t->judul }}</h2>
                  <a href="{{ url('thread/'. $t->id) }}" class="thumbnail">
                    <img src="{{asset('images/housemate_q/desain-rumah-kontrakan-kost-petak.jpg')}}" alt="">
                  </a>

                  <div class="caption">
                      <p> {{ $t->deskripsi }} </p>
                      <a href="{{ url('/thread/'. $t->id) }}" class="btn btn-primary">Lihat</a>
                  </div>
              </div>
          @endforeach
        </div>
    </div>

@endsection
