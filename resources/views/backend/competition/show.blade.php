@extends('backend.layout')
@section('content')
    <h2>ทีม</h2>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <label for="teamName">ชื่อทีม</label>
            <input disabled type="text" class="form-control" value="{{$data['team_name']}}">
        </div>
        @if($typeName == 'esport')
            <div class="col-md-6 col-xs-12">
                <label for="teamFb">เฟซบุ๊คที่สะดวกในการติดต่อทีม</label>
                <input disabled type="text" class="form-control" value="{{$data['team_fb']}}">
            </div>
        @endif
    </div>

    <ul class="nav nav-pills" style="margin-top: 10px;">
        <li class="active">
            <a href="#school" data-toggle="tab">
                <i class="fa fa-university"></i>
                School
            </a>
        </li>
        <li>
            <a href="#instructor" data-toggle="tab">
                <i class="fa fa-graduation-cap"></i>
                Instructor
            </a>
        </li>
        <li>
            <a href="#students" data-toggle="tab">
                <i class="fa fa-users"></i>
                Students
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade in active" id="school">
            <h2>สถานศึกษา</h2>
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                        <label>โรงเรียน</label>
                        <input disabled type="text" class="form-control" value ="{{$data['school']}}">
                    </div>
                </div>
            </div>
            @if($typeName != 'pitching')
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <input disabled type="text" class="form-control" value="{{$data['school_addr']}}">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>จังหวัด</label>
                        <input disabled type="text" class="form-control" value="{{$data['school_province']}}">
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="tab-pane fade" id="instructor">
            <h2>อาจารย์ผู้ควบคุมทีม</h2>
            <div class="row">
                <div class="col-md-2 col-xs-4">
                    <div class="form-group">
                        <label>คำนำหน้าชื่อ</label>
                        <input disabled type="text" class="form-control" value="{{$data['teacher_prefix']}}">
                    </div>
                </div>
                <div class="col-md-5 col-xs-8">
                    <div class="form-group">
                        <label>ชื่อ</label>
                        <input disabled type="text" class="form-control" value="{{$data['teacher_name']}}">
                    </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <div class="form-group">
                        <label for="teacherSurname">นามสกุล</label>
                        <input disabled type="text" class="form-control" value="{{$data['teacher_surname']}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="teacherPhone">เบอร์โทร</label>
                        <input disabled type="text" class="form-control" value="{{$data['teacher_phone']}}">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="teacher_email">อีเมล</label>
                        <input disabled type="text" class="form-control" value="{{$data['teacher_email']}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="students">
            <h2>สมาชิก</h2>
            @foreach($data->member as $index => $member)
                <h3>สมาชิก {{$index+1}}</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <input disabled type="text" class="form-control" value="{{$member['prefix']}}">
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input disabled type="text" class="form-control" value="{{$member['name']}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input disabled type="text" class="form-control" value="{{$member['surname']}}">
                        </div>
                    </div>
                </div>
                @if($typeName == 'esport')
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input disabled type="text" class="form-control" value="{{$member['steam']}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input disabled type="text" class="form-control" value="{{$member['facebook']}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($typeName == 'esport' || $typeName == 'network')
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input disabled type="text" class="form-control" value="{{$member['phone']}}">
                            </div>
                        </div>
                    </div>
                @endif
                @if($typeName != 'esport')
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label>ระดับการศึกษา</label>
                                @if($member['class'] == 0)
                                    <input disabled type="text" class="form-control" value="ปวช.">
                                @else
                                    <input disabled type="text" class="form-control" value="ม. {{$member['class']}}">
                                @endif

                            </div>
                        </div>
                    </div>
                @endif
                @if($typeName != 'esport' && $typeName != 'pitching')
                    <div class="row">
                        <div class="col-md-8 col-xs-6">
                            <div class="form-group">
                                <label>อีเมล</label>
                                <input disabled type="text" class="form-control" value="{{$member['email']}}">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    @if($typeName == 'pitching')
        <h2>แนวคิด</h2>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="concept">ชื่อแนวคิด</label>
                    <input type="text" class="form-control" placeholder="ชื่อแนวคิด" name="idea" value="{{$data['idea']}}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="idea_desc">รายละเอียดแนวคิด</label>
                    <textarea name="idea_desc" id="idea_desc" class="form-control" cols="30" rows="10" disabled>{{ $data['idea_desc'] }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <h2>Bizcanvas</h2>
                <a href="{{URL::route('getBizcanvas', $data->id)}}" class="btn btn-primary">Download</a>
            </div>
            <div class="col-xs-6">
                <h2>Storyboard</h2>
                <a href="{{URL::route('getStoryboard', $data->id)}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    @endif

    <h2>Confirm</h2>
    @if($data->confirm == 0)
        <span class="text-danger">
            <i class="fa fa-circle"></i>
        </span>
        ยังไม่ได้ส่ง
    @elseif($data->confirm == 1)
        <span class="text-success">
            <i class="fa fa-circle"></i>
        </span>
        เรียบร้อย
    @else
        <span class="text-primary">
            <i class="fa fa-circle"></i>
        </span>
        ลงทะเบียนซ้ำ
    @endif

    <h2>created_at</h2>
    {{$data->created_at}}

    <br><br>
    <a href="{{URL::route('backend.competition.'.$typeName.'.edit', $data->id)}}" class="btn btn-primary" data-toggle="tooltip"  title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

@endsection
