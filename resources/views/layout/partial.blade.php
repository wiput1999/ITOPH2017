<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} IT Ladkrabang Open House 2017</title>
    <meta property="og:image" content="{{URL('/og.png')}}">
    <link rel="shortcut icon" href="{{URL('/favicon.ico')}}" type="image/x-icon"/>

    @include('layout.js')

    @include('layout.css')
</head>

<body>
@include('layout.header')

@yield('content')

@include('layout.sponsor')

@include('layout.footer')

@include('layout.analytics')
</body>

</html>