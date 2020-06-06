<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <ul class="navbar-nav px-3 " style="display: flex; list-style: none; flex-direction: row;">
        @if(!\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item text-nowrap mr-3">
                <a class="nav-link" href="{{route('register')}}">عضویت</a>
            </li>
            <li class="nav-item text-nowrap mr-3">
                <a class="nav-link" href="{{route('login')}}">ورود</a>
            </li>
        @else
            <li class="nav-item text-nowrap mr-3">
                <a href="#" class="nav-link">{{ \Illuminate\Support\Facades\Auth::user()->name  }} عزیز خوش آمدید </a>
            </li>

            <a href="{{route('logout')}}" class="btn btn-primary mt-1 mb-1 mr-3">خروج</a>
        @endif
    </ul>
</nav>

<div class="container mt-5">
    @if(session('msg'))
        <div class="alert alert-primary">
            <p>
                {{session('msg')}}
            </p>
        </div>
    @endif

    @if($currencies && count($currencies) > 0 )
        <table class="table">
            <thead>
            <tr>
                @foreach($currencies as $currency)
                    <th>{{$currency->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($currencies as $currency)
                    <th>{{$currency->value}}</th>
                @endforeach
            </tr>
            </tbody>
        </table>
    @endif

        <div class="jumbotron col-xl-8">
            <h5 class="">موجودی کیف پول شما</h5>
            <p class="lead">{{\Illuminate\Support\Facades\Auth::user()->amount . $userCurrency->name}}</p>

            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{route('addwallet')}}" role="button">افزایش موجودی</a>
            <a class="btn btn-primary btn-lg" href="#" role="button">سفارش تبدیل ارز</a>
        </div>
</div>



</body>
</html>
