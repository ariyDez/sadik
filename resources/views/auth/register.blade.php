@extends('layouts.master')
@section('body')
    {!! Form::open() !!}
    @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Email' ])
    @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Password', 'placeholder' => 'Password' ])
    @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Confirm password', 'placeholder' => 'Password' ])
    @include('widgets.form._formitem_btn_submit', ['title' => 'Register'])
    {!! Form::close() !!}
@stop