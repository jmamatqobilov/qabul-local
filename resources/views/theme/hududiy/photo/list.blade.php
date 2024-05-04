@if($application)
    <div class="container">
        <div class="card">
            <div class="card-header" data-toggle="collapse"  href="#card-body-{!! $application->id !!}" role="button" aria-expanded="true" aria-controls="card-body-{!! $application->id !!}">
                <div class="row">
                    <div class="col-sm-2">
                        Order # {!! Html::link(route('hududiy.applications.show',['application'=>$application->id]),$application->id)  !!}
                    </div>
                    <div class="col-sm-2">
                        {!! $application->direction->name !!}
                    </div>
                    <div class="col-sm-2">
                        {!! $application->hududiy->company_name !!}
                    </div>
                    <div class="col-sm-2">
                        <span class="badge badge-secondary">{!! __($application->status->name) !!}</span>
                    </div>
                    <div class="col-sm-3">
                        @if($application->status->code == 'on_site_validation')
                            {!! Html::link(route('hududiy.applications.photos.create',['application'=>$application->id]), __('Add'), ['class'=>'btn btn-success']) !!}
                            <br/>
                            {!! Html::link(route('hududiy.applications.back_to_object_validation',['application'=>$application->id]), __('Back to Objects Validation'), ['class'=>'btn btn-danger']) !!}
                            {!! Html::link(route('hududiy.applications.back_to_endpoint_validation',['application'=>$application->id]), __('Back to Endpoints Validation'), ['class'=>'btn btn-danger']) !!}
                            {!! Html::link(route('hududiy.applications.on_site_validated',['application'=>$application->id]), __('On Site Validated'), ['class'=>'btn btn-primary']) !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body collapse show" id="card-body-{!! $application->id !!}">
                @if($application->photos->count()>0)
                    @foreach($application->photos as $photo)
                        <figure class="figure">
                            {!! Form::open(['url' => route('hududiy.applications.photos.destroy', ['application'=>$application->id, 'photo'=>$photo->id]), 'method' => 'DELETE']) !!}
                            {!! Form::submit('X', ['class'=>'close-button']) !!}
                            {!! Form::close() !!}
                            <a href="/{!! $photo->url !!}" data-fancybox="gallery" data-caption="{!! $photo->title !!}">
                                <img src="/{!! $photo->url_formatted !!}" title="{!! $photo->title !!}" class="figure-img img-fluid rounded img-thumbnail">
                            </a>
                            <figcaption class="figure-caption">{!! $photo->title !!}</figcaption>
                        </figure>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif
