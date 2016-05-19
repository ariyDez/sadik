{{--<nav class="navbar navbar-default">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">--}}
{{--<span class="sr-only">Toggle navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="collapse navbar-collapse" id="navbar-collapse">--}}
{{--<ul class="nav navbar-nav navbar-left">--}}
{{--<li>One</li>--}}
{{--<li>Two</li>--}}
{{--<li>Three</li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li>One</li>--}}
{{--<li>Two</li>--}}
{{--<li>Three</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">one</div>
            <div class="col-md-4">tow</div>
            <div class="col-md-4">three</div>
        </div>
    </div>
</nav>

<header>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <a href="/">
                    <div class="logo">
                        <img src="{{URL::asset('images/logo/logo.png')}}" alt="" width="300">
                    </div>
                </a>
            </div>
            <div class="col-md-8 menuContainer">
                <section>
                    <div class="menu">
                        <nav>
                            <table>
                                <tr>
                                    <td class=""><a href="#"><i class="fa fa-cube"><span>Садики</span></i></a></td>
                                    <td class=""><a href="#"><i class="fa fa-puzzle-piece"><span>Игрушки</span></i></a></td>
                                    <td class=""><a href="#"><i class="fa fa-shopping-bag"><span>Одежда</span></i></a></td>
                                    <td class=""><a href="/movies"><i class="fa fa-film"><span>Видео</span></i></a></td>
                                    <td class=""><a href="#"><i class="fa fa-trophy"><span>Конкурсы</span></i></a></td>
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