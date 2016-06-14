@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line blue">Корзина</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Total</td>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{Cart::total()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop