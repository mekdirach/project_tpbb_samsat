<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo">
            <img src="{{ asset('img/Logo.png') }}" alt="">
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2">{{ Session::get('navs') }}</span>
    </a>

    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
        <!-- Divider -->
        <hr class="d-lg-none w-100 my-2">

        <div class="navbar-nav align-items-lg-center ml-auto">

            <!-- Divider -->
            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|
            </div>

            <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{ ucwords(Session::get('user')->nama) }}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <span class="d-flex" style="padding-left: 15px;">{{ ucwords(Session::get('role')->name) }}</span>
                    <span class="d-flex" style="padding-left: 15px;">{{ ucwords(strtolower(Session::get('user')->namaCabang)) }}</span>
                    <span class="d-flex" style="padding-left: 15px;">{{ ucwords(strtolower(Session::get('user')->kodeCabang)) }}</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"><i
                            class="ion ion-ios-log-out text-danger"></i> &nbsp; Log Out</a>
                </div>
            </div>
        </div>
    </div>
</nav>
