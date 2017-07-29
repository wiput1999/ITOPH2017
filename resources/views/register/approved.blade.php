@extends('register.partial')
@section('content')
    <div class="paper">
        <div class="wrapper-70">
            <h1 class="h-light text-center">ประกาศรายชื่อผู้มีสิทธิ์เข้าร่วมการแข่งขันทางวิชาการ</h1>
            <h2 class="h-light text-center">{{ $type }}</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ชื่อทีม</th>
                        <th>ชื่อสถานศึกษา</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->team_name }}</td>
                            <td>{{ $team->school }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection