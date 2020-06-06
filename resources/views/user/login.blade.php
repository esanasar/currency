<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
    <title>Document</title>
</head>
<body>

    <div class="container mt-5">
        @if(session('error'))
            <div class="alert alert-danger">
                <p>
                    {{session('error')}}
                </p>
            </div>
            @endif
        <form method="post" action="{{route('dologin')}} ">
            {{csrf_field()}}
            <div class="col-lg-8">
                <h3>ورود به سایت</h3>
                <hr>
                <div class="form-group">
                    <label for="email">آدرس ایمیل</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">به هیچ عنوان آدرس ایمیل شما در اختیار شخص
                        دیگری قرار نخواهد گرفت</small>
                </div>
                <div class="form-group">
                    <label for="password">پسورد</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
{{--                <div class="form-group form-check">--}}
{{--                    <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">--}}
{{--                    <hr>--}}
{{--                    <label class="form-check-label" for="rememberMe">مرا به خاطر بسپار</label>--}}
{{--                </div>--}}

            </div>
            <button type="submit" class="btn btn-primary">تایید</button>
        </form>
    </div>
</body>
</html>
