@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="container">
        <div class="row" style="margin-top: 6em;">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    {{-- <div class="panel-heading">
                    <h3 class="text-center text-custom"> <strong style="color: #2ecc71;">HOUSEMATE-Q</strong> MEMBER PAGE </h3>
                </div> --}}

                <div class="panel-body">
                    <h3 class="text-center text-custom"> <strong style="color: #2ecc71;">HOUSEMATE-Q</strong> MEMBER PAGE </h3>
                    <br>
                    <br>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail">

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
                            <div class="col-md-10 col-md-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-primary" style="background-color: #FF4081; border: none; width: 100%;">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
