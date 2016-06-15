<meta charset="utf-8">
<meta name="_token" content="{{csrf_token()}} ?>">
<link rel="stylesheet" href="{{URL::asset('css/app.css')}}">

<script src="{{URL::asset('js/app.js')}}"></script>
<script src="{{URL::asset('js/Cart.js')}}"></script>
<script src="https://api-maps.yandex.ru/2.1/?load=package.full&lang=ru_RU" type="text/javascript"></script>
<script src="{{URL::asset('js/map.js')}}"></script>
<title>@if(isset($title)){{$title}}@endif</title>
