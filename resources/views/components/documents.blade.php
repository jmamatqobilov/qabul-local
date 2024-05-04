{{--<div class="side-gallery">--}}
{{--    <div class="side-gallery-btn">--}}
{{--        <i data-feather="x" class="side-icon side-icon_closed"></i>--}}
{{--        <img src="{{ asset('assets/img/icons/docs-list.svg') }}"  class="side-icon_open" alt="">--}}
{{--    </div>--}}
{{--    <div class="side-gallery-content">--}}
{{--        <div class="side-gallery__title">--}}
{{--            <img src="{{ asset('assets/img/icons/paper.svg') }}"  class="title-icon" alt="">--}}
{{--            {{ __('Documents') }}--}}
{{--        </div>--}}
{{--        @foreach($documents as $document)--}}
{{--            <div class="ex-upload-item" id="{!! $document->id !!}" draggable="true">--}}
{{--                <div class="ex-upload-item-box">--}}
{{--                    <div class="ex-upload-item__header">--}}
{{--                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" class="icon-file" alt="">--}}
{{--                        <img src="{{ asset('assets/img/icons/pdf-invert.svg') }}" class="icon-file-invert" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="ex-upload-item__content">--}}
{{--                        <div class="ex-upload-item__title">--}}
{{--                            {!! $document->file_name !!}--}}
{{--                        </div>--}}
{{--                        <div class="ex-upload-item__date">--}}
{{--                            {!! $document->created_at !!}--}}
{{--                        </div>--}}
{{--                        <a href="{!! route('file.get', $document->id) !!}" target="_blank" class="ex-upload-item__favorite">--}}
{{--                            <i data-feather="eye" class="side-icon side-icon_closed"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
