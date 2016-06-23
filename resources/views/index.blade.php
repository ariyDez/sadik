@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="gardens">
                    <h1 class="line red">Популярные садики</h1>
                    @foreach($gardens as $garden)
                    <div class="col-md-3">
                        <a href="{{action('GardenController@show', $garden->id)}}">
                            <img src="{{$garden->image}}" alt="" width="200" height="180">
                            <h3>{{$garden->title}}</h3>
                        </a>
                    </div>
                    @endforeach
                    {{--@for($i=0; $i<8; $i++)--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="item">--}}
                                {{--<img src="/images/foo/sadik1.png" alt="" width="200" height="180">--}}
                                {{--<h3>sdfsdf</h3>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--@endfor--}}
                </div>
                <div class="clearfix"></div>
                <h1 class="line yellow">Одежда</h1>
                @foreach($goods as $good)
                    <div class="col-md-4">
                        <div class="item">
                            <a href="{{action('ClothesController@show', $good->id)}}">
                                <img src="{{$good->image}}" alt="" width="100%" height="250">
                            </a>
                            <div class="nav">
                                <table>
                                    <tr>
                                        <td>
                                            <form>
                                                <input type="hidden" name='qty' value="1">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$good->id}}">
                                            </form>
                                            <a href="javascript:" class="rar" onclick="Cart.add(this)"><i class="fa fa-shopping-cart"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <h4>{{$good->title}}<span>{{$good->price}} сом</span></h4>
                        </div>
                    </div>
                @endforeach;
                <div class="clearfix"></div>
                <h1 class="line orange">Игрушки</h1>
                @foreach($toys as $toy)
                    <div class="col-md-4">
                        <div class="item">
                            <a href="{{action('ToyController@show', $toy->id)}}">
                                <img src="{{$toy->image}}" alt="" width="100%" height="250">
                            </a>
                            <div class="nav">
                                <table>
                                    <tr>
                                        <td>
                                            <form>
                                                <input type="hidden" name='qty' value="1">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$toy->id}}">
                                            </form>
                                            <a href="javascript:" onclick="Cart.add(this)"><i class="fa fa-shopping-cart"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <h4>{{$toy->title}}<span>{{$toy->price}} сом</span></h4>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="col-md-3">
                <img src="/images/foo/3.jpg" alt="" width="100%">
                <h1 class="line purple">Новости</h1>
                @for($i=0;$i<3;$i++)
                    <div class="media">
                        <div class="media-left media-top">
                            <a href="">
                                <img class="media-object" src="/images/foo/news.png" alt="" width="100" height="100">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Bla-bla-bla</h4>
                            Nulla quis lorem ut libero malesuada feugiat.
                        </div>
                    </div>
                @endfor

                <h1 class="line green">Видео</h1>
                @for($i=0;$i<3;$i++)
                    <div class="media">
                        <div class="media-left media-top">
                            <a href="">
                                <img class="media-object" src="/images/foo/videos.png" alt="" width="100" height="100">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Bla-bla-bla</h4>
                            Nulla quis lorem ut libero malesuada feugiat.
                        </div>
                    </div>
                @endfor
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <img src="/images/foo/6.jpg" alt="" width="100%">
                <h1 class="line lblue">Конкурсы</h1>
                @foreach($competitions as $competition)
                    <div class="media">
                        <a href="{{action('CompetitionController@show', $competition->id)}}">
                            <div class="media-left media-top">
                                <img class="media-object" src="{{$competition->image}}" alt="" width="100" height="100">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$competition->title}}</h4>
                                {!! $competition->desc !!}
                            </div>
                        </a>
                    </div>
                @endforeach
                <h1 class="line purple">Блог</h1>
                @for($i=0;$i<3;$i++)
                    <div class="media">
                        <div class="media-left media-top">
                            <a href="">
                                <img class="media-object" src="/images/foo/blog.png" alt="" width="100" height="100">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Bla-bla-bla</h4>
                            Nulla quis lorem ut libero malesuada feugiat.
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-md-9">
                <h1 class="line blue">Секции</h1>
                @for($i=0; $i<8; $i++)
                    <div class="col-md-3">
                        <div class="item">
                            <img src="/images/foo/section2.png" alt="" width="200" height="180">
                            <h3>sdfsdf</h3>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <h1 class="line pink">Наши партнеры</h1>
                @for($i=0;$i<8;$i++)
                    <div class="col-md-3">
                        <div class="item">
                            <img src="/images/foo/brand.png" alt="" width="200" height="180">
                            <h3>sdfsdf</h3>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@stop