<div class="col-md-3">
    @foreach($laravelAdminMenus->menus as $section)    
        @if($section->items)
            @if($section->section == 'Super Admin Features')
                @if(Auth::check() && Auth::user()->hasRole('super-admin'))
                <div class="card">
                    <div class="card-header">
                        {{ $section->section }}
                    </div>

                    <div class="card-body">
                        <ul class="nav flex-column" role="tablist">
                            @foreach($section->items as $menu)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="{{ url($menu->url) }}">
                                        {{ $menu->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br/>
                @endif
            @else
            <div class="card">
                <div class="card-header">
                    {{ $section->section }}
                </div>

                <div class="card-body">
                    <ul class="nav flex-column" role="tablist">
                        @foreach($section->items as $menu)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ url($menu->url) }}">
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br/>
            @endif
        @endif
    @endforeach
</div>
