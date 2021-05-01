<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Sidebar Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/stocks" class="nav-link {{ Request::is('stocks') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Stock

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/authors" class="nav-link {{ Request::is('authors') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Author

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/sales" class="nav-link {{ Request::is('sales') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Sales

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/customers" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employees" class="nav-link {{ Request::is('employees') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employee
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/books" class="nav-link {{ Request::is('books') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Book
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/publishers" class="nav-link {{ Request::is('publishers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Publisher</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suppliers" class="nav-link {{ Request::is('suppliers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Supplier

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
