<h2 class="section-title">{{ __('Application') }}</h2>
<div class="collection-list">
    <div class="row">
        @foreach($directions as $direction)
            <div class="col-md-3 col-6">
                <a href="" class="collection-item">
                    <div class="collection-item__header collection-header">
                        <div class="collection-header__title">{{ $direction->name }}</div>
                        <div class="collection-header__icon">
                            <i data-feather="{{ $direction->icon }}"></i>
                        </div>
                    </div>
                    <div class="collection-header__content collection-content">
                        <div class="collection-content__value">{{ $direction->itemscount }}</div>
                        <div class="collection-content__sub">{{ __('Application') }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
