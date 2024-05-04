@if(isset($documents))
@foreach($documents as $document)
{{--    <label>{{ __('fieldnames.'.$fieldname) }}:</label>--}}
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
@endforeach
@endif
@foreach($filefields as $filefield)
    @php $fieldname = $filefield[0]; if(!isset($object->$fieldname)) continue; @endphp
    <div class="form-group">
        {{--    @dd($object->$fieldname->file_name)--}}
        {{--    @dd($documents)--}}

{{--@dd($object)--}}
        <label>{{ __('fieldnames.'.$fieldname) }}:</label>
        @if($filefield[1] == 'file')
{{--            @dd($object);--}}
{{--            @dd($object->$fieldname)--}}

            @if(isset($object->$fieldname))
                <div class="ex-upload-item">
                    <a class="ex-upload-item-box" href="{{ route('file.get', $object->$fieldname->id) }}" target="_blank">
                        <div class="ex-upload-item__header">
                            <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">
                            <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">
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

        @elseif($filefield[1] == 'text')
            @if($filefield[0] == 'punkt_ustanovki_location')
                @if(isset($object->$fieldname)) <span>{!! $object->$fieldname !!}</span> @endif
                {!! Form::hidden($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control']) !!}
                <div id="map" readonly="true"></div>
            @else
                {!! isset($object->$fieldname) ? $object->$fieldname : '' !!}
            @endif
        @elseif($filefield[1] == 'select' && isset($object->$fieldname))
            @php $fieldname = \Illuminate\Support\Str::replaceFirst('_id', '', $fieldname); @endphp
            {!! isset($object->$fieldname) ? $object->$fieldname->name : '' !!}
        @endif
    </div>
@endforeach
{!! Html::link(route('user.applications.objects.index', ['application' => $application->id]), __('back to list'), ['class'=>'btn btn-warning']) !!}
