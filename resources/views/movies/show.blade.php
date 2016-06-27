@extends('layouts.master')

@section('body')
    <div class="col-md-12">
        <h2>{{$movie->title}}</h2>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$movie->href}}" frameborder="0" allowfullscreen></iframe>
    </div>
@stop