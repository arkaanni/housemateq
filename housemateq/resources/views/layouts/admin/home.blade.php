@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container-fluid" style="padding-top: 4em">
        <div class="row">
            <div class="col-md-2" style="background-color: #fff; padding: 3em 2em; height: 95vh">
                <ul class="nav nav-pills nav-stacked">
                    <h5 style="margin-bottom: 2em"><strong>Navigation</strong></h5>
                    <li class="active"> <a href="#wishlist" data-toggle="tab"> Wishlist </a> </li>
                    <li> <a href="#order" data-toggle="tab"> Order </a> </li>
                    <h5 style="margin-bottom: 2em"><strong>Monitoring</strong></h5>
                    <li> <a href="#pending-thread" data-toggle="tab"> Pending Thread </a> </li>
                    <li> <a href="#cekal-thread" data-toggle="tab"> Cekal Thread </a> </li>
                    <li> <a href="#komentar" data-toggle="tab"> Komentar </a> </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div id="wishlist" class="tab-pane fade in active">
                        <h2>Wishlist</h2>
                    </div>
                    <div id="order" class="tab-pane fade">
                        <h2>Order</h2>
                    </div>
                    <div id="pending-thread" class="tab-pane fade">
                        <h2>Pending Thread</h2>
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Nama Thread</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($pendingThread as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->judul }}</td>
                                        <td>{{ $t->deskripsi }}</td>
                                        @if ($t->status == 0)
                                            <td>Pending</td>
                                        @endif
                                        <td><a href="{{ url('pending/'. $t->id) }}" class="btn btn-primary">Lihat</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="cekal-thread" class="tab-pane fade">
                        <h2>Cekal Thread</h2>
                    </div>
                    <div id="komentar" class="tab-pane fade">
                        <h2>Komentar</h2>
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Thread Id</th>
                                <th>User Id</th>
                                <th>Komentar</th>
                            </thead>
                            <tbody>
                                @foreach ($komentar as $k)
                                    <tr>
                                        <td>{{ $k->id }}</td>
                                        <td>{{ $k->thread_id }}</td>
                                        <td>{{ $k->user_id }}</td>
                                        <td>{{ $k->value }}</td>
                                        <td>
                                            <form class="form" action="{{ url('api/komentar/'. $k->id .'/hapus') }}" method="post">
                                                <input class="btn btn-danger" type="submit" name="hapus_komentar" value="Hapus">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('footer')
    @include('layouts.footer')
@endsection --}}
