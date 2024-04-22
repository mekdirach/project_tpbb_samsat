<h4 class="media align-items-center font-weight-bold py-3 mb-2">
    <div class="media-body ml-3">
    @foreach (Session::get('menus') as $menu)
        @foreach ($menu['childs'] as $child)
            @if (request()->segment(2) == $child['slug'])
                {{ $child['description'] }}
            @endif
        @endforeach

        @if (request()->segment(1) == $menu['slug'] && request()->segment(1) == 'dashboard')
            {{ $menu['description'] }}
        @elseif (request()->segment(1) == $menu['slug'])
            <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">{{ $menu['description'] }}</small></div>
        @endif
    @endforeach
    </div>
</h4>

<hr class="container-m--x mt-0 mb-4">
@if (request()->segment(4))
    @foreach(session('menus') as $menu)
        @foreach($menu['childs'] as $child)
            @if(request()->segment(2) == $child['slug'])
                <div class="row justify-content-end mr-1 mb-2">
                    <a href="{{ url('/' . $menu['slug'] . '/' . $child['slug']) }}" class="btn btn-secondary"><i class="ion ion-md-arrow-round-back mr-1"></i> Kembali</a>
                </div>
            @endif
        @endforeach
    @endforeach
@endif
