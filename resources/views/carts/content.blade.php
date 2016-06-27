@extends('layouts.master')

@section('body')
    <h1 class="line blue">Корзина</h1>
    @if(count($contents)>0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                    <tr>
                        <td>{{$content->name}}</td>
                        <td>{{$content->qty}}</td>
                        <td>{{$content->price}}</td>
                        <td>{{$content->subtotal}}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>Общая сумма:</th>
                    <td></td>
                    <td></td>
                    <th>{{Cart::total()}}</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2"><a href="{{action('OrderController@index')}}" class="btn btn-primary">Подтвердить</a></td>
                </tr>
            </tbody>
        </table>
        @else
        Корзина пуста
    @endif
@stop