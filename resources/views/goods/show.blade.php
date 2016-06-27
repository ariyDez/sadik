@extends('layouts.master')

@section('body')
    <h1 class="line {{$color}}">{{$item->title}}</h1>
    <div class="col-md-7">

        <img src="/{{$item->image}}" alt="" width="400" height="350">
    </div>
    <div class="col-md-5">
        <form>
            <div>Цена: {{$item->price}} сом</div>
            <div><input type="number" name='qty' max="5" min="0" class="form-control" placeholder="Количество в шт."></div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$item->id}}">
            <div>Цвета:</div>
            @foreach($item->colors as $color)
                <div class="color" style="background: #{{$color->value}}"></div>
            @endforeach
            <div>{!! $item->description !!}</div>
        </form>

        <a href="javascript:" class="btn btn-primary" onclick="Cart.add(this)">Add to Cart</a>
    </div>
@stop
