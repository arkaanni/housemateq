
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
                        <h3>Deskripsi</h3>
                        <p class="caption">{{ $thread->deskripsi }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        {{-- <form class="form" action="{{ url('api/thread/validasi') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $thread->id }}">

                            <input class="btn btn-primary" type="submit" name="validasi" value="Validasi">
                            <input class="btn btn-primary" type="submit" name="validasi" value="Tolak">
                        </form> --}}
                        <button id="pilih-valid" type="button" class="btn btn-primary btn-lg" data-target="#modal-validasi" data-toggle="modal">Validasi</button>
                        <button id="pilih-valid" type="button" class="btn btn-danger btn-lg" data-target="#modal-tolak" data-toggle="modal">Tolak</button>
                    </div>
                </div>
                <div class="modal fade" id="modal-validasi" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="validasi-title"></h4>
                      </div>
                      <div class="modal-body">
                          <h4>Anda yakin thread ini divalidasi dan dipublikasikan?</h4>
                      </div>
                      <div class="modal-footer">
                        <form class="form" action="{{ url('thread/validasi') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $thread->id }}">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input id="validasi" class="btn btn-primary" type="submit" name="validasi" value="Validasi">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="validasi-title"></h4>
                      </div>
                      <div class="modal-body">
                          <h4>Anda yakin akan menolak dan menghapus thread?</h4>
                      </div>
                      <div class="modal-footer">
                        <form class="form" action="{{ url('thread/validasi') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $thread->id }}">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input id="validasi" class="btn btn-primary" type="submit" name="validasi" value="Tolak">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
