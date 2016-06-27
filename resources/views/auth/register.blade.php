@extends('layouts.master')
@section('body')
    <div class="col-md-4"></div>
    <div class="col-md-4">
        {!! Form::open() !!}
        @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Email', 'class' => 'form-control', 'id' => 'email'])
        @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password'])
        @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Повторите пароль', 'placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password_confirm'])
        @include('widgets.form._formitem_btn_submit', ['title' => 'Регистрация'])
        {!! Form::close() !!}
    </div>
    <div class="col-md-4"></div>
@stop