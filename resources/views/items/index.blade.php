@extends('layouts.master')

@section('body')
    <h1 class="line {{$color}}">{{$moduleName}}</h1>
    @foreach($items as $item)
        <div class="col-md-4 item">
            <a href="{{action($controller.'Controller@show', $item->id)}}">
                <img src="{{$item->image}}" alt="" width="300" height="260">
                <div class="nav">
                    <table>
                        <tr>
                            <td><a href="#"><i class="fa fa-shopping-cart"></i></a></td>
                            <td><a href="#"><i class="fa fa-shopping-cart"></i></a></td>
                            <td><a href="#"><i class="fa fa-shopping-cart"></i></a></td>
                            <td><a href="#"><i class="fa fa-shopping-cart"></i></a></td>
                        </tr>
                    </table>
                </div>
                <h3>{{$item->title}}</h3>
            </a>
        </div>
    @endforeach
@stop