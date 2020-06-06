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
    <form method="post" action="{{route('doaddwallet')}} ">
        {{csrf_field()}}
        <div class="col-lg-8">
            <h3>افزودن به کیف پول</h3>
            <hr>
            <div class="jumbotron col-xl-6">
                <h5 class="">موجودی فلی</h5>
                <p class="lead">{{$user->amount . $userCurrency->name}}</p>
            </div>
            <div class="form-group">
                <label for="amount">مبلغ جهت افزایش</label>
                <input type="text" name="amount" class="form-control" id="amount">
                <p>{{$userCurrency->name}}</p>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">تایید</button>
    </form>
</div>
</body>
</html>
