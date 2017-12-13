<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a href="#">Mewah</a> </li>
                        <li> <a href="#">Luas</a> </li>
                        <li> <a href="#">Minimalis</a> </li>
                        <li> <a href="#">Sederhana</a> </li>
                        <li> <a href="#">Kecil</a> </li>
                    </ul>
                </li>

                <li>
                    <form class="navbar-form" role="search" action="/cari">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="q" style="min-width: 100%; width: 300px;">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>

                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"> <span class="glyphicon glyphicon-bell"></span> </a>

                        <ul class="dropdown-menu">
                            @if ($notifikasi)
                                @foreach ($notifikasi as $notif)
                                    <li>
                                        <h4> {{ $notif->id }} </h4>
                                        <p> {{ $notif->message }} </p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            @if (Auth::user()->role == '0')
                                <li>
                                    <a href="{{ url('member') }}">Member</a>
                                </li>
                            @elseif (Auth::user()->role == '1')
                                <li>
                                    <a href="{{ url('admin') }}">Admin</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>
