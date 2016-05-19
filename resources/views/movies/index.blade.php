@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-3">
                    <a href="{{action('MovieController@show', $movie->id)}}">
                        <img src="{{$movie->image}}" alt="" width="200" height="260">
                        <h3>{{$movie->title}}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@stop