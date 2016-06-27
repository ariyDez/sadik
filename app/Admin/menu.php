<?php
use \SleepingOwl\Admin\Admin;

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
if(Sentinel::check() && Sentinel::inRole('admin'))
    Admin::menu()->label('Пользователи')->icon('fa-users')->items(function(){
        Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
        Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
        Admin::menu(App\User::class)->label('Пользователи')->icon('fa-user');
    });
Admin::menu()->label('Садики')->icon('fa-tree')->items(function(){
    Admin::menu(App\District::class)->label('Районы')->icon('fa-map-marker');
    Admin::menu(App\Type::class)->label('Типы')->icon('fa-institution');
    Admin::menu(App\Teacher::class)->label('Учителя')->icon('fa-female');
    Admin::menu(App\Section::class)->label('Кружки')->icon('fa-puzzle-piece');
    Admin::menu(App\Garden::class)->label('Садики')->icon('fa-child');
    Admin::menu(App\Recall::class)->label('Отзывы')->icon('fa-comments');
});

Admin::menu()->label('Статьи')->icon('fa-book')->items(function(){
    Admin::menu(App\ArticleCategory::class)->label('Категория')->icon('fa-bars');
    Admin::menu(App\Article::class)->label('Новости')->icon('fa-tag');
});

Admin::menu()->label('Мультимедиа')->icon('fa-folder')->items(function(){
    Admin::menu(App\MovieCategory::class)->label('Категория')->icon('fa-bars');
    Admin::menu(App\Movie::class)->label('Видео')->icon('fa-film');
});

Admin::menu()->label('Товары')->icon('fa-shopping-cart')->items(function(){
    Admin::menu(App\GoodCategory::class)->label('Категории')->icon('fa-bars');
    Admin::menu(App\Color::class)->label('Цвета')->icon('fa-bars');
    Admin::menu(App\Good::class)->label('Товары')->icon('fa-money');
    if(Sentinel::check() && Sentinel::inRole('admin'))
        Admin::menu(App\Order::class)->label('Заказы')->icon('fa-usd');
});
Admin::menu()->label('Конкурсы')->icon('fa-shopping-cart')->items(function(){
    Admin::menu(App\Competition::class)->label('Конкурсы')->icon('fa-trophy');
    Admin::menu(App\PhotoCompetition::class)->label('Участники')->icon('fa-image');
});
