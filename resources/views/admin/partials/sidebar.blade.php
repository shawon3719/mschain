<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
        <img src="{{asset('img/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MS Chain Int.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/admin/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('admin')}}" class="nav-link  @if(Route::is('admin')) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{--<i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    {{-- <a href="{{route('admin.inbox')}}" class="nav-link @if(Route::is('admin.inbox')) active @endif
                    ">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Inbox
                    </p>
                    </a> --}}
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>
                            Manage Sliders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sliders')}}"
                                class="nav-link  @if(Route::is('admin.sliders')) active @endif">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Sliders Setup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-stream nav-icon"></i>
                        <p>
                            Manage Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.categories')}}"
                                class="nav-link @if(Route::is('admin.categories')) active @endif">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Category Setup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-box-open nav-icon"></i>
                        <p>
                            Manage Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products')}}"
                                class="nav-link  @if(Route::is('admin.products')) active @endif">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Product Setup</p>
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
