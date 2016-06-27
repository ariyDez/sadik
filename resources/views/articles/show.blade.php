@extends('layouts.master')

@section('body')

    <h1>{{$article->title}}</h1>
    <img src="/{{$article->image}}" alt="">
    <div class="body">{!! $article->text !!}</div>

@stop