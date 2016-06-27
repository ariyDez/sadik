@extends('layouts.master')
@section('body')
    <div class="col-md-4"></div>
    <div class="col-md-4">
        {!! Form::open() !!}
        @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль', 'id'=>'password', 'class' => 'form-control'])
        @include('widgets.form._formitem_password', ['name' => 'password_confirm', 'title' => 'Подтверждение пароля', 'placeholder' => 'Пароль', 'id'=>'password_confirm', 'class' => 'form-control'])
        @include('widgets.form._formitem_btn_submit', ['title' => 'Подтвердить'])
        {!! Form::close() !!}
    </div>
    <div class="col-md-4"></div>
@stop
