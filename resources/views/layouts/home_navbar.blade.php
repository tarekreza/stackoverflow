        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        @if (auth()->user()->is_admin ==1 )
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        @endif
                        @auth
                        @if (auth()->user()->is_admin ==0 )
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                        </li>
                        @endif
                        @endauth
                        
                        

                    </ul>

                    <!-- SEARCH FORM -->
                    <form action="{{ route('search') }}" method="POST" class="form-inline ml-0 ml-md-3">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="query" type="search"
                                placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @if (Route::has('signin'))
                        @auth
                            <li class="nav-item mx-2">
                                <form action="{{ route('signout') }}" method="post">
                                    @csrf
                                    <input class="btn btn-block btn-danger " type="submit" value="Sign out">
                                </form>
                            </li>
                        @else
                            <li class="nav-item mx-2">
                                <a href="{{ route('signin') }}" class="btn btn-block btn-default ">Sign in</a>
                            </li>

                            @if (Route::has('signup'))
                                <li class="nav-item">
                                    <a href="{{ route('signup') }}" class="btn btn-block btn-primary">Sign up</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->