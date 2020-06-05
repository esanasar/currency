<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
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
    <form method="post" action="{{route('doregister')}} ">
        {{csrf_field()}}
        <div class="col-lg-8">
            <div class="form-group">
                <label for="name">نام</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">لطفا نام کامل خود را وارد کنید</small>
            </div>
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
            <div class="form-group">
                <label for="repassword">تکرار پسورد</label>
                <input type="password" name="repassword" class="form-control" id="repassword">
            </div>
            <div class="form-group">
                <label for="amount">مبلغ</label>
                <input type="text" class="form-control" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="currency">واحد پولی</label>
                <select class="form-control" id="currency" name="currency">
                    @if($currencies && count($currencies) > 0 )
                        @foreach($currencies as $currency)
                            <option value="{{$currency->id}}">{{$currency->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">تایید</button>
        </div>
    </form>
</div>
</body>
</html>
