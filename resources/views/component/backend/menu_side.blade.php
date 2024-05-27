<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $name }}"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>{{ $title }}</span>
    </a> 
        {{-- @if (str_contains(request()->route()->getName(), 'category'))
            {{ $show = 'show'; }}
       @endif --}}
    <div id="{{ $name }}"
         class="collapse {{ request()->routeIs('admin.category.*') ? 'show' : '' }}"
         aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lý {{ $title }}:</h6>
            <a class="collapse-item" href="{{ route('admin.'.$name.'.index') }} ">Danh sách {{ $title }}</a>
            <a class="collapse-item" href="{{ route('admin.'.$name.'.create') }}">Thêm {{ $title }} </a>
        </div>
    </div>
</li>




