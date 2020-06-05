<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link href="css/style.css" rel="stylesheet">
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
                    <a href="#" class="nav-link">{{ \Illuminate\Support\Facades\Auth::user()->name  }}  عزیز خوش آمدید </a>
                </li>

                <a href="{{route('logout')}}" class="btn btn-primary mt-1 mb-1 mr-3">خروج</a>
            @endif
        </ul>
    </nav>

    <div class="container mt-5">
        @if(session('error'))
            <div class="alert alert-danger">
                <p>
                    {{session('error')}}
                </p>
            </div>
        @endif
    </div>

</body>
</html>
