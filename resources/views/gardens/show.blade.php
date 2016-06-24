@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line red">{{$garden->title}}</h1>
            <div class="col-md-8">
                <img src="/{{$garden->image}}" alt="" width="500" height="400">
            </div>
            <div class="col-md-4">
                <div>Район: {{$garden->district->title}}</div>
                <div>Тип: {{$garden->type->title}}</div>
                <div>
                    Общее количество мест: {{$garden->seats}}
                    <div class="seats">
                        @for($i=1; $i<=$garden->engaged; $i++)
                            <i class="fa fa-child engaged"></i>
                        @endfor
                    </div>
                    <div class="seats">
                        @for($i=1; $i<=2; $i++)
                            <i class="fa fa-child reserved"></i>
                        @endfor
                        @for($i=1; $i<=$garden->seats-$garden->engaged-2; $i++)
                            <i class="fa fa-child free"></i>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(count($teachers) > 0)
                <h1 class="line red short">Воспитатели</h1>
                @foreach($teachers as $teacher)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="/{{$teacher->image}}" alt="" width="300" height="250">
                            <div class="caption">
                                <h3>{{$teacher->name}}</h3>
                                <p>
                                    <div>Позиция: {{$teacher->position}}</div>
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
                <div class="clearfix"></div>
            @endif
            @if(count($sections) > 0)
                <h1 class="line red short">Кружки</h1>
                @foreach($sections as $section)
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="/{{$section->image}}" alt="" width="300" height="250">
                            <div class="caption">
                                <h3>{{$section->title}}</h3>
                                {!! $section->info !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            @endif
            <h1 class="line red">Отзывы</h1>
            <div class="recalls">
                @if(count($garden->recalls) > 0)
                    @foreach($garden->recalls as $recall)
                        <div class="media">
                            <div class="media-left">
                                <img src="/images/foo/noavatar.png" alt="" class="media-object" width="100">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$recall->user->email}}({{$recall->created_at}})</h4>
                                <p>{{$recall->text}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty">Будьте первым! Оставьте отзыв</div>
                @endif
            </div>

            @if(Sentinel::check())
                <form action="javascript:">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user" value="{{Sentinel::getUser()->id}}">
                    <input type="hidden" name="garden" value="{{$garden->id}}">
                    <textarea name="text" id="" cols="30" rows="10" class="form-control" placeholder="Оставьте отзыв..."></textarea>
                    <button class="btn btn-primary" id="recallSend">Отправить</button>
                </form>
            @endif
        </div>
    </div>

@stop