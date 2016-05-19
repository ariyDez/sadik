@extends('app')

@section('content')
    <h1>{{$type->title}}</h1>
    <div class="body">
        {{$type->info}}
    </div>
@stop