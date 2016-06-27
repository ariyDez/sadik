@extends('layouts.master')

@section('body')
    <h1>Districts</h1>
    @foreach($districts as $district)
        <h2>
            <a href="{{action('DistrictController@show', [$district->id])}}">{{$district->title}}</a>
        </h2>
        <div class="body">
            {{$district->info}}
        </div>
    @endforeach
@stop