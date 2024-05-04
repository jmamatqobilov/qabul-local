@if($menu)
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Основное</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @include(config('laravel-menu.views.bootstrap-items'), ['items' => $menu->roots()])
        </ul>
{{--        <h1>salam</h1>--}}
    </div>
</nav>
@endif
