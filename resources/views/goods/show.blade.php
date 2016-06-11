@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>{{$good->title}}</h2>
                <img src="/{{$good->image}}" alt="">
            </div>
            <div class="col-md-5">
                <div>{{$good->price}}</div>
                <div>{{$good->color}}</div>
            </div>
        </div>
    </div>
@stop
