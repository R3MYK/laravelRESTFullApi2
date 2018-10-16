@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Personas</div>

                <div class="panel-body">
                    @foreach($personas as $personas)
                        {{$personas->nombre}}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
