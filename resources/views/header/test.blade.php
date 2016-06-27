
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <ul class="auth">
                    @if(Sentinel::check())
                        <li>{{Sentinel::getUser()->first_name?:Sentinel::getUser()->email}}</li>
                        <li><a href="/logout">Выход</a></li>
                    @else
                        <li><a href="/register">Регистрация</a></li>
                        <li><a href="/login">Вход</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

<header>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <a href="/">
                    <div class="logo">
                        <img src="{{URL::asset('images/logo/logo.png')}}" alt="" width="300">
                    </div>
                </a>
            </div>
            <div class="col-md-9 menuContainer">
                <section>
                    <div class="cart-search-line">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6"></div>
                            <div class="col-md-2">
                                <div class="cart">
                                    <a href="{{action('CartController@content')}}"><i class="fa fa-shopping-basket"><span class="badge cart-badge">{{count(Cart::content())}}</span></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="menu">
                        <nav>
                            <table>
                                <tr>
                                    <td class=""><a href="/gardens"><i class="fa fa-cube"><span>Садики</span></i></a></td>
                                    <td class=""><a href="/toys"><i class="fa fa-puzzle-piece"><span>Игрушки</span></i></a></td>
                                    <td class=""><a href="/clothes"><i class="fa fa-shopping-bag"><span>Одежда</span></i></a></td>
                                    <td class=""><a href="/movies"><i class="fa fa-film"><span>Видео</span></i></a></td>
                                    <td class=""><a href="/competitions"><i class="fa fa-trophy"><span>Конкурсы</span></i></a></td>
                                    <td class=""><a href="#"><i class="fa fa-newspaper-o"><span>Секции</span></i></a></td>
                                    <td class=""><a href="#"><i class="fa fa-newspaper-o"><span>Новости</span></i></a></td>
                                    {{--<td class=""><a href="#"><i class="fa fa-pencil"><span>Блог</span></i></a></td>--}}
                                </tr>
                            </table>
                        </nav>
                    </div>
                </section>
            </div>
        </div>
    </div>
</header>