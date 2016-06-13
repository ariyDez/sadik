@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line red">{{$garden->title}}</h1>
            <div class="col-md-8">
                <img src="/{{$garden->image}}" alt="" width="500" height="400">
            </div>
            <div class="col-md-4">
                <div>Район: {{$garden->district->title}}</div>
                <div>Тип: {{$garden->type->title}}</div>
            </div>
            <div class="clearfix"></div>
            <h1 class="line red">Воспитатели</h1>
            @foreach($teachers as $teacher)
                <div class="col-md-4">
                    <img src="/{{$teacher->image}}" alt="" width="300" height="250">
                    <div>
                        <div>Name: {{$teacher->name}}</div>
                        <div>Role: {{$teacher->position}}</div>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
            <h1 class="line red">Кружки</h1>
            @foreach($sections as $section)
                <div class="col-md-4">
                    <img src="/{{$section->image}}" alt="" width="300" height="250">
                    <div>
                        <div>Title: {{$section->title}}</div>
                        <div>Info: {!! $section->info !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop