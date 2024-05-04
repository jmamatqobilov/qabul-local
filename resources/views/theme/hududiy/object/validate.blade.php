{!! Form::open(['url' => route('hududiy.applications.objects.update', ['object'=>$object->id, 'application'=>$application->id]), 'method'=>'POST', 'class'=>'form', 'files' => true]) !!}
@foreach($filefields as $filefield)
    @php if($filefield[0] == 'object_type_id') continue; $fieldname = $filefield[0]; $fieldnamecomment = $filefield[0].'_comment'; $fieldnamedel = $filefield[0].'_del'; @endphp
<div class="form-group">
    <label>{{ __('fieldnames.'.$fieldname) }}</label>
    <div class="row">
        @if($filefield[1] == 'file')
            <div class="col-md-4">
                @if(isset($object->$fieldname))
                    <div class="ex-upload-item w-100">
                        <a class="ex-upload-item-box" href="{!! route('file.get', $object->$fieldname->id) !!}" target="_blank">
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
            <div class="col-md-12">
                @if($filefield[0] == 'punkt_ustanovki_location')
                    @if(isset($object->$fieldname)) <span>{!! $object->$fieldname !!}</span> @endif
                    {!! Form::hidden($fieldname, isset($object->$fieldname) ? $object->$fieldname  : old($fieldname), ['class' => 'form-control']) !!}
                    <div id="map" readonly="true"></div>
                @else
                    {!! isset($object->$fieldname) ? $object->$fieldname : '' !!}
                @endif
            @endif
        </div>
        <div class="col-md-8">
            {!! Form::text($fieldnamecomment, isset($object->$fieldnamecomment) ? $object->$fieldnamecomment : old($fieldnamecomment), ['class' => 'form-control']) !!}
            @if($object->$fieldnamecomment)
                {!! Form::checkbox($fieldnamedel, 'Y', false, ['class' => 'form-control']) !!}
            @endif
        </div>
    </div>
</div>
@endforeach
<div class="form-group">
    <div class="col-md-6 offset-md-4">
        @if(isset($object->id))
            <input type="hidden" name="_method" value="PUT">
            {!! Html::link(route('hududiy.applications.objects.index',['application'=>$application->id]),__('Cancel'),['class'=>'btn btn-secondary'])  !!}
        @endif
        {!! Form::button(__('Save'),['class'=>'btn btn-primary','type'=>'submit']) !!}
    </div>
</div>
{!! Form::close() !!}
