@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1>Districts</h1>
            @foreach($districts as $district)
                <h2>
                    <a href="{{action('DistrictController@show', [$district->id])}}">{{$district->title}}</a>
                </h2>
                <div class="body">
                    {{$district->info}}
                </div>
            @endforeach
        </div>
    </div>

@stop