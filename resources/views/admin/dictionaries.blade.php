@extends('layouts.app')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dictionaries</div>

                    <div class="card-body">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Object Types</h5>
                                <a href="{!! route('admin.dictionaries.objecttypes.index') !!}" class="card-link">more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
