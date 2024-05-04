<div class="row">
    <div class="col-md-12">
        <div class="order-list">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-12">
                    <a href="{{route('ukn.applications.index')}}" class="order-item">
                        <div class="order-item__count">{{ $stats['applications_in_week'] }}</div>
                        <div class="order-item__title">{{ __('tile1title') }}</div>
                    </a>
                </div>
{{--                @dd($stats)--}}
                <div class="col-xl-4 col-md-6 col-12">
                    <a href="{{route('ukn.objects.index')}}" class="order-item">
                        <div class="order-item__count">{{ $stats['objects_created'] }}</div>
                        <div class="order-item__title">{{ __('objects_created') }}</div>
                    </a>
                </div>
{{--                <div class="col-xl-4 col-md-6 col-12">--}}
{{--                    <a href="#" class="order-item">--}}
{{--                        <div class="order-item__count">{{ $stats['objects_deleted'] }}</div>--}}
{{--                        <div class="order-item__title">{{ __('objects_deleted') }}</div>--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="col-xl-4 col-md-6 col-12">
                    <a href="{{route('ukn.endpoints.index')}}" class="order-item">
                        <div class="order-item__count">{{ $stats['endpoints_created'] }}</div>
                        <div class="order-item__title">{{ __('Endpoints') }}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
