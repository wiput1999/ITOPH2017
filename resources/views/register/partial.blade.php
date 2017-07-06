<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} IT Ladkrabang Open House 2017</title>

    @include('layout.js')

    @include('layout.css')
</head>

<body>
@include('register.nav')

<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($success))
        <div class="alert alert-success" role="alert">
            ลงทะเบียนสำเร็จ ขอบคุณที่สนใจเข้าร่วมงานของเรา
        </div>
    @endif
</div>

@yield('content')

@include('layout.sponsor')

@include('layout.footer')

</body>

</html>