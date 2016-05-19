@extends('app')

@section('content')
    <h1>{{$district->title}}</h1>
     <div class="body">
         {{$district->info}}
     </div>
@stop