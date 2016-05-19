@extends('app')

@section('content')
    <h1>Types</h1>
    @foreach($types as $type)
        <h2>
            <a href="{{action('TypeController@show', [$type->id])}}">{{$type->title}}</a>
        </h2>
        <div class="body">
            {{$type->info}}
        </div>
    @endforeach
@stop