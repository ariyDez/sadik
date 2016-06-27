@extends('layouts.master')

@section('body')
    <div class="col-md-8">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
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
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        @if(!Sentinel::check())
                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Вход</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Регистрация</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <form action="">
                                        <label for=""></label>
                                        <input type="email" name="email" placeholder="Enter email" class="form-control">
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">2</div>
                            </div>

                        </div>
                    </div>
                    @else
                        Вход выполнен как {{Sentinel::getUser()->email}}
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <form action="{{action('OrderController@setOrder')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label for="deliver0">Самовывоз</label>
                            <input type="radio" name="deliver" value="0" id="deliver0">
                            <label for="deliver1">Доставка курьером</label>
                            <input type="radio" name="deliver" value="300" id="deliver1">
                            <input type="hidden" name="total" value="{{$total}}">
                            <div>Общая сумма: <span>{{$total}}</span></div>
                            <input type="submit" value="Отправить" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md4"></div>
@stop