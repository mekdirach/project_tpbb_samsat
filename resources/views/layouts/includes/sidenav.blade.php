<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ asset('img/Logo.png') }}" alt="">
        </span>

        <a href="{{ route('dashboard')}}" class="app-brand-text demo sidenav-text font-weight-bold ml-2">{{ Session::get('navs') }}</a>
        <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>

    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->

        @foreach (Session::get('menus') as $menu)
        @if (intval($menu['type']) == 3)
            <li class="sidenav-item {{ request()->segment(1) == $menu['slug'] ? 'active' : '' }}">
                <a href="{{ URL::to('/') . '/' . $menu['slug'] }}" class="sidenav-link"><i
                        class="sidenav-icon {{ $menu['icon'] }}"></i>
                    <div>{{ $menu['name'] }}</div>
                </a>
            </li>

	    <!-- <div class="sidenav-divider mt-0"></div> -->

        @else
            <li class="sidenav-item {{ request()->segment(1) == $menu['slug'] ? 'open active' : '' }}">
                <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i
                        class="sidenav-icon {{ $menu['icon'] }}"></i>
                    <div>{{ $menu['name'] }}</div>
                </a>

                <ul class="sidenav-menu">
                    @foreach ($menu['childs'] as $child)
                    <li class="sidenav-item {{ request()->segment(2) == $child['slug'] ? 'active' : '' }}">
                        <a href="{{ URL::to('/') . '/' . $menu['slug'] . '/' . $child['slug'] }}" class="sidenav-link">
                            <div>{{ $child['name'] }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        @endif
        @endforeach
    </ul>
</div>
