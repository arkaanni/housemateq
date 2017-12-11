@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid" style="padding-top: 4em">
        <div class="row">
            <div class="col-md-2" style="background-color: #fff; padding: 3em 2em; height: 95vh">
                <ul class="nav nav-pills nav-stacked">
                    <h5 style="margin-bottom: 2em">Navigation</h5>
                    <li class="active"> <a href="#wishlist" data-toggle="tab"> Wishlist </a> </li>
                    <li> <a href="#buat-thread" data-toggle="tab"> Buat Thread </a> </li>
                    <li> <a href="#order" data-toggle="tab"> Order </a> </li>
                    <h5 style="margin-bottom: 2em">Monitoring</h5>
                    <li> <a href="#thread" data-toggle="tab"> Thread </a> </li>
                    <li> <a href="#komentar" data-toggle="tab"> Komentar </a> </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="tab-content">
                    <div id="wishlist" class="tab-pane fade in active">
                        <h2>Wishlist</h2>
                    </div>
                    <div id="buat-thread" class="tab-pane fade">
                        <h2>Buat Thread</h2>
                        <p>Buat thread dan iklankan rumah anda.</p>
                        <form class="form form-horizontal" action="{{ url('api/thread/create') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group container-fluid">
                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <h5 class="text-muted"><b>UMUM</b></h5>
                                                <br>
                                                <label for="#judul">Nama Thread <span class="text-danger">*</span></label>
                                                <input id="judul" class="form-control input-sm" type="text" name="judul" placeholder="e.g Rumah Mewah Harga Terjangkau">
                                                <br>
                                                <label for="#deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                                <textarea id="deskripsi" class="form-control input-sm" name="deskripsi" placeholder="e.g Rumah Mewah Harga Terjangkau" rows="5" style="resize: none"></textarea>
                                                <br>
                                                <label for="#kategori">Kategori <span class="text-danger">*</span></label>
                                                <select id="kategori" class="form-control input-sm" name="kategori">
                                                    <option value="0">Mewah</option>
                                                    <option value="1">Luas</option>
                                                    <option value="2">Minimalis</option>
                                                    <option value="3">Sederhana</option>
                                                    <option value="4">Kecil</option>
                                                </select>
                                                <br>
                                                <label for="#harga">Harga <span class="text-danger">*</span></label>
                                                <input class="form-control input-sm" id="harga" type="text" name="harga" placeholder="Harga rumah pertahun">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group container-fluid">
                                                <input class="form-control" type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <h5 class="text-muted"><b>META DATA</b></h5>
                                                <br>
                                                <label for="#judul-meta">Judul Meta <span class="text-danger">*</span></label>
                                                <input id="judul-meta" class="form-control input-sm" type="text" name="judul_meta" placeholder="e.g Rumah Mewah Harga Terjangkau">
                                                <br>
                                                <label for="#keyword-meta">Keyword Meta <span class="text-danger">*</span></label>
                                                <input class="form-control input-sm" id="keyword-meta" type="text" name="keyword_meta" placeholder="e.g Rumah Mewah Harga Terjangkau">
                                                <br>
                                                <label for="#deskripsi-meta">Deskripsi Meta<span class="text-danger">*</span></label>
                                                <textarea id="deskripsi-meta" class="form-control input-sm" name="deskripsi_meta" placeholder="e.g Rumah Mewah Harga Terjangkau" rows="5" style="resize: none"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Buat Thread">
                        </form>
                    </div>
                    <div id="order" class="tab-pane fade">
                        <h2>Order</h2>
                    </div>
                    <div id="thread" class="tab-pane fade">
                        <h2>Thread Anda</h2>
                    </div>
                    <div id="komentar" class="tab-pane fade">
                        <h2>Komentar Anda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer')
@include('layouts.footer')
@endsection --}}
