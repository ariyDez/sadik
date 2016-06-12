@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line green">Конкурсы</h1>
            @foreach($competitions as $competition)
                <div class="col-md-3">
                    <a href="{{action('CompetitionController@show', $competition->id)}}">
                        <img src="{{$competition->image}}" alt="" width="200" height="260">
                        <h3>{{$competition->title}}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@stop