@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line {{$color}}">{{$item->title}}</h1>
            <div class="col-md-7">

                <img src="/{{$item->image}}" alt="" width="400" height="350">
            </div>
            <div class="col-md-5">
                <form>
                    <div>Цена: {{$item->price}} сом</div>
                    <div><input type="number" max="5" min="0" class="form-control" placeholder="Количество в шт."></div>
                    <div>Цвета: {{$item->color}}</div>
                    <div>{!! $item->description !!}</div>
                </form>

                <a href="javascript:" class="btn btn-primary" onclick="Cart.add(this, {{$item->id}}, '{{csrf_token()}}')">Add to Cart</a>
            </div>
        </div>
    </div>
    <script>
        console.log(name);
    </script>
@stop
