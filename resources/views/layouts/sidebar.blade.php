<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
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
