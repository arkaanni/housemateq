@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container" style="margin-top: 5em;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pembayaran
                    </div>
                    <div class="panel-body">
                        <form class="form" action="{{ url('bayar/'. $wishlist->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="thread_id" value="{{ $wishlist->thread_id }}">
                            <input type="hidden" name="jumlah" value="{{ $jumlah }}">
                            <div class="row">
                                <div class="col-md-5 text-center" style="padding: 2em;">
                                    <h4>Pilh Bank : </h4>
                                    <br>
                                    <img src="{{ asset('images/bank/bank_bri.jpg') }}" width="50%">
                                    <div class="form-group">
                                        <br>
                                        <input type="radio" name="pilih_bank" value="{{ $banks[0]['id'] }}">{{ $banks[0]['nama'] }}
                                        <h4>{{ $banks[0]['nomor_rekening'] }}</h4>
                                    </div>
                                    <br>
                                    <img src="{{ asset('images/bank/bank_bca.png') }}" width="50%">
                                    <div class="form-group">
                                        <br>
                                        <input type="radio" name="pilih_bank" value="{{ $banks[1]['id'] }}">{{ $banks[1]['nama'] }}
                                        <h4>{{ $banks[1]['nomor_rekening'] }}</h4>
                                    </div>
                                    <br>
                                    <img src="{{ asset('images/bank/bank_bni.png') }}" width="50%">
                                    <div class="form-group">
                                        <br>
                                        <input type="radio" name="pilih_bank" value="{{ $banks[2]['id'] }}">{{ $banks[2]['nama'] }}
                                        <h4>{{ $banks[2]['nomor_rekening'] }}</h4>
                                    </div>
                                </div>

                                <div class="col-md-7" style="padding: 2em;">
                                    <h4>Tagihan : </h4>
                                    <br>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Id Wishlist</th>
                                                <td>{{$wishlist->id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Pemilik Thread</th>
                                                <td>{{$wishlist->thread->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Harga Rumah</th>
                                                <td>{{$wishlist->thread->harga}}</td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Wishlist</th>
                                                <td>{{$wishlist->thread->max_wishlist}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tagihan Anda</th>
                                                <td>{{$jumlah}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" value="Bayar" class="btn btn-primary form-control ipnut-lg">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
