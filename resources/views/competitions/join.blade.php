@extends('layouts.master')

@section('body')
    <form enctype="multipart/form-data"action="/competitions/{{$competition->id}}/joinProcess" method="post" data>
        {{csrf_field()}}
        <input type="file" name="image">
        <input type="submit" value="send">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
@stop