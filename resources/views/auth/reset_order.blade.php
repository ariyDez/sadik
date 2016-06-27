@extends('layouts.master')
@section('body')
    <div class="col-md-4"></div>
    <div class="col-md-4">
        {!! Form::open() !!}
        @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Email', 'id' => 'email', 'class' => 'form-control' ])
        @include('widgets.form._formitem_btn_submit', ['title' => 'Сброс пароля'])
        {!! Form::close() !!}
    </div>
    <div class="col-md-4"></div>
@stop
