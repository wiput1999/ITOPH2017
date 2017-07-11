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