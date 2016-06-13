@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line red">Садики</h1>
            @foreach($gardens as $garden)
                <div class="col-md-3">
                    <a href="{{action('GardenController@show', $garden->id)}}">
                        <img src="{{$garden->image}}" alt="" width="200" height="260">
                        <h3>{{$garden->title}}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@stop