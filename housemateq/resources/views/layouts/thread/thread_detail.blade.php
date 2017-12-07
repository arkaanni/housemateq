@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container">
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
                    <div class="col-md-4" id="wishlist-container">
                        {{-- <h5 class="text-center">Wishlist</h5> --}}
                        <table class="table">
                            <thead>
                                <th class="text-center">Wishlist</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                                <tr>
                                    <td> <a href="#">argaergafbgyuar</a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <h3>Deskripsi</h3>
                        <p class="caption">{{ $thread->deskripsi }}</p>
                    </div>
                    <div class="col-md-4" style="padding: 0">
                        <br>
                        <input class="btn btn-primary" type="button" name="btn_masuk_wishlist" value="Masuk Wishlist">
                    </div>
                    <div class="col-md-8">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
