@extends('layouts.master')

@section('body')
    <h1 class="line lblue">Конкурсы</h1>
    @foreach($competitions as $competition)
        <div class="col-md-3">
            <a href="{{action('CompetitionController@show', $competition->id)}}">
                <img src="{{$competition->image}}" alt="" width="200" height="260">
                <h3>{{$competition->title}}</h3>
            </a>
        </div>
    @endforeach
@stop