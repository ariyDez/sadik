@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$movie->title}}</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$movie->href}}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

@stop