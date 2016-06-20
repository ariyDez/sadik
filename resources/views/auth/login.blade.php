@extends('layouts.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                {!! Form::open() !!}
                @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Введите Email', 'class' => 'form-control', 'id' => 'email'])
                @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль', 'class' => 'form-control', 'id' => 'password' ])
                @include('widgets.form._formitem_checkbox', ['name' => 'remember', 'title' => 'Запомнить меня'] )
                @include('widgets.form._formitem_btn_submit', ['title' => 'Отправить', 'id' => 'press'])
                {!! Form::close() !!}
                <p><a href="{{URL::to('/reset')}}">Забыли пароль?</a></p>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>

@stop