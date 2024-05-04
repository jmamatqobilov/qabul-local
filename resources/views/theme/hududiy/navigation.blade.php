@if($menu)
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav side-menu" id="side-menu">
            @include(config('laravel-menu.views.bootstrap-items'), ['items' => $menu->roots()])
        </ul>
    </div>
@endif
