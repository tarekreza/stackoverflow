<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
    </ul>


    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                <li class="nav-item mx-2">
                    <form action="{{ route('signout') }}" method="post">
                        @csrf
                        <input class="btn btn-block btn-danger " type="submit" value="Sign out">
                    </form>
                </li>

    </ul>
</nav>
