<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="dist/img/AdminLTELogo.png" alt="Stackoverflow Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Stackoverflow</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->first_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-right right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All user</p>
                            </a>
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create user</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Manage Category
                            <i class="fas fa-angle-right right"></i>
                            
                            <ion-icon name="duplicate-outline"></ion-icon>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All category</p>
                            </a>
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cubes"></i>
                        <p>
                            Manage Questions
                            <i class="fas fa-angle-right right"></i>
                            
                            <ion-icon name="duplicate-outline"></ion-icon>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('questions.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All questions</p>
                            </a>
                            <a href="{{ route('questions.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ask question</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
