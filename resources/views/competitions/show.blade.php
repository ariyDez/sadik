@extends('layouts.master')

@section('body')
    <div class="container">
        <div class="row">
            <h1 class="line lblue">{{$competition->title}}</h1>
            <div class="col-md-6">
                <img src="/{{$competition->image}}" alt="">
            </div>
            <div class="col-md-6">
                <div>Количество участников: {{count($participiants)}}</div>
                <div>Дата начала: {{$competition->started_at}}</div>
                <div>Дата окончания: {{$competition->finished_at}}</div>
                {!! $competition->desc !!}
                <div><a href="{{action('CompetitionController@joinShow', $competition->id)}}" class="btn btn-primary">Join</a></div>
            </div>
            <div class="clearfix"></div>
            <h1 class="line lblue">Участники</h1>
            @foreach($participiants as $participiant)
                <div class="col-md-4 item">
                    <img src="/{{$participiant->image}}" alt="" width="300" height="250">
                    <div class="nav">
                        <table>
                            <tr>
                                <td><a href="#"><i class="fa fa-thumbs-up"><span class="badge">3</span></i></a></td>
                                <td><a href="#"><i class="fa fa-facebook-official"></i></a></td>
                                <td><a href="#"><i class="fa fa-vk"></i></a></td>
                                <td><a href="#"><i class="fa fa-odnoklassniki"></i></a></td>
                                <td><a href="#"><i class="fa fa-twitter"></i></a></td>
                                <td><a href="#"><i class="fa fa-google-plus-square"></i></a></td>

                            </tr>
                        </table>
                    </div>
                    <div>
                        <div>Title: {{$participiant->title}}</div>
                        <div>Author: {{$participiant->user->email}}</div>

                    </div>
                </div>    
            @endforeach
        </div>
    </div>

@stop