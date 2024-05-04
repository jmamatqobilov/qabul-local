{!! Form::open(['url' => (isset($object->id) && !(isset($copy) && $copy)) ? route('user.applications.objects.update', ['object'=>$object->id, 'application'=>$application->id]) : route('user.applications.objects.store', ['application'=>$application->id]), 'method'=>'POST', 'accept-charset'=>'UTF-8', 'files' => true]) !!}

<h1>EDIT</h1>


@if(isset($object_types) && $application->status->code != 'refill_objects')
    <div class="form-group">
        <label for="objecttype_id">{{ __('fieldnames.object_type_id') }}</label>
        {!! Form::select('object_type_id', $object_types, isset($object->object_type_id) ? $object->object_type->id  : '',['class'=>'ex-select ex-select_default'.($errors->has('object_type_id') ? ' is-invalid':'')]) !!}
        @error('object_type_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
@endif
{{--@dd($filefields)--}}
{{--@dd(isset($documents))--}}

@if(isset($documents))
@foreach($documents as $document)
    <label>{{ __('fieldnames.'.$document->doc_type) }}:</label>
    <div class="ex-upload-item">
        <a class="ex-upload-item-box" href="{{ route('file.get', $document->id) }}" target="_blank">
            <div class="ex-upload-item__header">
                <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
            </div>
            <div class="ex-upload-item__content">
                <div class="ex-upload-item__title">
                    {!! $document->file_name !!}
                </div>
                <div class="ex-upload-item__date">
                    {!! $document->created_at !!}
                </div>
            </div>
        </a>
    </div>


    <div class="form-group">
        @if($filefield[1] == 'file')
            <div class="label">
                {{ __('fieldnames.'.$fieldname) }}
                @if($filefield[2] == 'required') * @endif
            </div>
        <!--    clone hide        -->
{{--                        @dd($fieldname)--}}
{{--        @foreach($documents as $document)--}}
            <div id="label-filefield-{{$fieldname}}" class="clone hide increment">
                <label class="input-file file-area-to-drag">
                    <div class="input-file__label">

{{--                        @dd($documents)--}}
                        @if(isset($object->$fieldname))
                            <div class="ex-upload-item">
                                <a class="ex-upload-item-box" href="/{!! $object->$fieldname->file_url !!}"
                                   target="_blank">
                                    <div class="ex-upload-item__header">
                                        <img src="{{asset('assets/img/icons/pdf.svg')}}" class="icon-file" alt="">
                                        <img src="{{asset('assets/img/icons/pdf-invert.svg')}}" class="icon-file-invert" alt="">
                                    </div>
                                    <div class="ex-upload-item__content">
                                        <div class="ex-upload-item__title">
                                            {!! $object->$fieldname->file_name !!}
                                        </div>
                                        <div class="ex-upload-item__date">
                                            {!! $object->$fieldname->created_at !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <i data-feather="upload-cloud" width="30" height="30" class="mr-2"></i> {{ __('Drop files here to upload or choose file') }}
                    </div>
                    {!! Form::hidden($fieldname, isset($object->$fieldname) ? $object->$fieldname->id  : '') !!}
                    {!! Form::file($fieldname.'_file[]',['class'=>'form-control-file'.($errors->has($fieldname.'_file[]') || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
                    @error($fieldname.'_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if(isset($fieldnamecomment))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $object->$fieldnamecomment }}</strong>
                            </span>
                    @endif
                </label>
            </div>
{{--            @endforeach--}}

            <div class="input-group-btn">
                <button id="filefield-{{$fieldname}}" class="btn btn-success" data-id="filefield-{{$fieldname}}"
                        type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add
                </button>
            </div>

        @elseif($filefield[1] == 'text')
            <p class="map-warn">{{ __('Select in Map') }}</p>
            <label>{{ __('fieldnames.'.$fieldname) }}</label>
            @if($filefield[0] == 'punkt_ustanovki_location')
                {!! Form::text($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control'.($errors->has($fieldname) || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
                <div id="map"></div>
            @else
                {!! Form::text($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control'.($errors->has($fieldname) || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
            @endif
        @endif
        @error($fieldname)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if(isset($fieldnamecomment))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $object->$fieldnamecomment }}</strong>
        </span>
        @endif
    </div>

@endforeach
@endif


@foreach($filefields as $filefield)
    @php
        if($filefield[0] == 'object_type_id') continue;
        $fieldname = $filefield[0];
        if(isset($object) && $object->comments->count()>0 && $application->status->code == 'refill_objects'){
            $fieldnamecomment = $filefield[0].'_comment';
            if(!isset($object->$fieldnamecomment))
                continue;
        }
    @endphp
    <div class="form-group">
        @if($filefield[1] == 'file')
            <div class="label">
                {{ __('fieldnames.'.$fieldname) }}
                @if($filefield[2] == 'required') * @endif
            </div>

            {{--            <label class="input-file file-area-to-drag increment">--}}
            {{--                <div class="input-file__label">--}}
            {{--                    @if(isset($object->$fieldname))--}}
            {{--                        <div class="ex-upload-item">--}}
            {{--                            <a class="ex-upload-item-box" href="/{!! $object->$fieldname->file_url !!}" target="_blank">--}}
            {{--                                <div class="ex-upload-item__header">--}}
            {{--                                    <img src="{{asset('assets/img/icons/pdf.svg')}}" class="icon-file" alt="">--}}
            {{--                                    <img src="{{asset('assets/img/icons/pdf-invert.svg')}}" class="icon-file-invert"--}}
            {{--                                         alt="">--}}
            {{--                                </div>--}}
            {{--                                <div class="ex-upload-item__content">--}}
            {{--                                    <div class="ex-upload-item__title">--}}
            {{--                                        {!! $object->$fieldname->file_name !!}--}}
            {{--                                    </div>--}}
            {{--                                    <div class="ex-upload-item__date">--}}
            {{--                                        {!! $object->$fieldname->created_at !!}--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                    @endif--}}
            {{--                    <i data-feather="upload-cloud" width="30" height="30"--}}
            {{--                       class="mr-2"></i> {{ __('Drop files here to upload or choose file') }}--}}
            {{--                </div>--}}
            {{--                {!! Form::hidden($fieldname, isset($object->$fieldname) ? $object->$fieldname->id  : '') !!}--}}
            {{--                {!! Form::file($fieldname.'_file',['class'=>'form-control-file'.($errors->has($fieldname.'_file') || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}--}}
            {{--                @error($fieldname.'_file')--}}
            {{--                <span class="invalid-feedback" role="alert">--}}
            {{--                    <strong>{{ $message }}</strong>--}}
            {{--                </span>--}}
            {{--                @enderror--}}
            {{--                @if(isset($fieldnamecomment))--}}
            {{--                    <span class="invalid-feedback" role="alert">--}}
            {{--                    <strong>{{ $object->$fieldnamecomment }}</strong>--}}
            {{--                </span>--}}
            {{--                @endif--}}
            {{--            </label>--}}

        <!--    clone hide        -->
{{--                        @dd($fieldname)--}}
{{--        @foreach($documents as $document)--}}
            <div id="label-filefield-{{$fieldname}}" class="clone hide increment">
                <label class="input-file file-area-to-drag">
                    <div class="input-file__label">

{{--                        @dd($object->$fieldname)--}}
{{--                        @if(isset($object->$fieldname))--}}
{{--                            <div class="ex-upload-item">--}}
{{--                                <a class="ex-upload-item-box" href="/{!! $object->$fieldname->file_url !!}"--}}
{{--                                   target="_blank">--}}
{{--                                    <div class="ex-upload-item__header">--}}
{{--                                        <img src="{{asset('assets/img/icons/pdf.svg')}}" class="icon-file" alt="">--}}
{{--                                        <img src="{{asset('assets/img/icons/pdf-invert.svg')}}" class="icon-file-invert" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="ex-upload-item__content">--}}
{{--                                        <div class="ex-upload-item__title">--}}
{{--                                            {!! $object->$fieldname->file_name !!}--}}
{{--                                        </div>--}}
{{--                                        <div class="ex-upload-item__date">--}}
{{--                                            {!! $object->$fieldname->created_at !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @dd($documents)--}}
                        @if(isset($object->$fieldname))
                            <div class="ex-upload-item">
                                <a class="ex-upload-item-box" href="/{!! $object->$fieldname->file_url !!}"
                                   target="_blank">
                                    <div class="ex-upload-item__header">
                                        <img src="{{asset('assets/img/icons/pdf.svg')}}" class="icon-file" alt="">
                                        <img src="{{asset('assets/img/icons/pdf-invert.svg')}}" class="icon-file-invert" alt="">
                                    </div>
                                    <div class="ex-upload-item__content">
                                        <div class="ex-upload-item__title">
                                            {!! $object->$fieldname->file_name !!}
                                        </div>
                                        <div class="ex-upload-item__date">
                                            {!! $object->$fieldname->created_at !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <i data-feather="upload-cloud" width="30" height="30" class="mr-2"></i> {{ __('Drop files here to upload or choose file') }}
                    </div>
                    {!! Form::hidden($fieldname, isset($object->$fieldname) ? $object->$fieldname->id  : '') !!}
                    {!! Form::file($fieldname.'_file[]',['class'=>'form-control-file'.($errors->has($fieldname.'_file[]') || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
                    @error($fieldname.'_file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if(isset($fieldnamecomment))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $object->$fieldnamecomment }}</strong>
                            </span>
                    @endif
                </label>
            </div>
{{--            @endforeach--}}

            <div class="input-group-btn">
                <button id="filefield-{{$fieldname}}" class="btn btn-success" data-id="filefield-{{$fieldname}}"
                        type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add
                </button>
            </div>

            {{--            <div class="clone hide">--}}
            {{--                <div class="hdtuto control-group lst input-group" style="margin-top:10px">--}}
            {{--                    <input type="file" name="filenames[]" class="myfrm form-control">--}}
            {{--                    <div class="input-group-btn">--}}
            {{--                        <button class="btn btn-danger" type="button"><i--}}
            {{--                                    class="fldemo glyphicon glyphicon-remove"></i> Remove--}}
            {{--                        </button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        @elseif($filefield[1] == 'text')
            <p class="map-warn">{{ __('Select in Map') }}</p>
            <label>{{ __('fieldnames.'.$fieldname) }}</label>
            @if($filefield[0] == 'punkt_ustanovki_location')
                {!! Form::text($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control'.($errors->has($fieldname) || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
                <div id="map"></div>
            @else
                {!! Form::text($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control'.($errors->has($fieldname) || isset($fieldnamecomment) ? ' is-invalid':'')]) !!}
            @endif
        @endif
        @error($fieldname)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if(isset($fieldnamecomment))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $object->$fieldnamecomment }}</strong>
        </span>
        @endif
    </div>
@endforeach
<div class="form-group mt-4">
    @if(isset($object->id) && !(isset($copy) && $copy))
        <input type="hidden" name="_method" value="PUT">
        {!! Html::link(route('user.applications.objects.index',['application'=>$application->id]),__('Cancel'),['class'=>'btn btn-success btn-round'])  !!}
    @endif
    {!! Form::button(__('Save'),['class'=>'btn btn-primary btn-round','type'=>'submit']) !!}
</div>
{!! Form::close() !!}

