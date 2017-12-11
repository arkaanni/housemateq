@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid" style="margin-top: 5em">
        <div class="jumbotron">
            <div class="container-fluid">
                {{-- <div class="page-header"> --}}
                    <h4>Selamat Datang di</h4>
                    <h1><strong>Housemate Q</strong></h1>
                {{-- </div> --}}
                <h4>Housemate Q merupakan platform untuk mencari teman kontrakan secara online.</h4>
                <div style="margin-top: 16em">
                    <a href="#main" class="btn btn-primary" style="padding: 1em 2em;" id="mulai">Mulai</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="main">
                @foreach ($thread as $t)
                    @if ($t->status == 1)
                        <div class="col-md-4">
                            <a href="#" class="thumbnail">
                              <img src="{{asset('images/housemate_q/desain-rumah-kontrakan-kost-petak.jpg')}}" alt="">
                            </a>

                            <div class="caption">
                                <p> {{ $t->deskripsi }} </p>
                                <a href="{{ url('/thread/'. $t->id) }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#mulai').bind('click', function() {
                $.smoothScroll({
                    scrollTarget: '#main',
                    speed: 1500,
                    offset: 1000
                });
            })
        })
    </script>
@endsection
