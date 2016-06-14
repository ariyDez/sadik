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
                <h1 class="line red">Воспитатели</h1>
                @foreach($teachers as $teacher)
                    <div class="col-md-4">
                        <img src="/{{$teacher->image}}" alt="" width="300" height="250">
                        <div>
                            <div>Name: {{$teacher->name}}</div>
                            <div>Role: {{$teacher->position}}</div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            @endif
            @if(count($sections) > 0)
                <h1 class="line red">Кружки</h1>
                @foreach($sections as $section)
                    <div class="col-md-4">
                        <img src="/{{$section->image}}" alt="" width="300" height="250">
                        <div>
                            <div>Title: {{$section->title}}</div>
                            <div>Info: {!! $section->info !!}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@stop