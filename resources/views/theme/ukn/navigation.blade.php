@if($menu)
    <div class="sidebar-nav navbar-collapse d-flex flex-column justify-content-between">
        <ul class="nav side-menu" id="side-menu">
            @include(config('laravel-menu.views.bootstrap-items'), ['items' => $menu->roots()])
        </ul>
{{--        <div><img class="technocorp" src="/assets/img/technocorp.jpg" /></div>--}}
    </div>
@endif
