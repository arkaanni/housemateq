@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="padding-top: 6em;">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <h3 class="col-md-10 col-md-offset-1 text-center text-custom" ><strong style="color: #1abc9c; font-size: 19px;">HOUSEMATE-Q</strong> MEMBER REGISTER</h3>

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{-- <label for="name" class="col-md-4 control-label">Name</label> --}}

                                <div class="col-md-10 col-md-offset-1" style="margin-top: 4em;">
                                    <input id="name" type="text" class="form-control input-sm" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                {{-- <label for="name" class="col-md-4 control-label">Name</label> --}}

                                <div class="col-md-10 col-md-offset-1">
                                    <input id="username" type="text" class="form-control input-sm" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                                <div class="col-md-10 col-md-offset-1">
                                    <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                                <div class="col-md-10 col-md-offset-1">
                                    <input id="password" type="password" class="form-control input-sm" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {{-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> --}}

                                <div class="col-md-10 col-md-offset-1">
                                    <input id="password-confirm" type="password" class="form-control input-sm" name="password_confirmation" required placeholder="Confirmation Password">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-success" style="width: 100%; border: none; background-color: #27ae60;">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
