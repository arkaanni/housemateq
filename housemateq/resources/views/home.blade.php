@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid">
        <div class="jumbotron" style="background-color: rgba(207, 216, 220,1.0)">
            <div class="container-fluid">
                <div class="page-header">
                    <h4>Selamat Datang di</h4>
                    <h1><strong>Housemate Q</strong></h1>
                </div>
                <h4>Housemate Q merupakan platform untuk mencari teman kontrakan secara online.</h4>
                <a href="#main" class="btn btn-primary">Mulai</a>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-md-6 col-md-offset-1">
                <a href="#" class="thumbnail">
                  <img src="{{asset('images/housemate_q/desain-rumah-kontrakan-kost-petak.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
