@extends('backend.layout')
@section('content')
    <section class="regis-error">
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
    <form action="{{URL::route('backend.competition.pitching.update', $data->id)}}" method="post">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        {{--ทีม--}}
        <h3>ชื่อทีม</h3>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <label for="team_name">ชื่อทีม</label>
                <input type="text" class="form-control" placeholder="ITKMTIL" name="team_name" value="{{$data['team_name']}}" required>
            </div>
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
                {{--สถานศึกษา--}}
                <h3>สถานศึกษา</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label for="school">โรงเรียน</label>
                            <input type="text" class="form-control" placeholder="ชื่อโรงเรียน" name="school" value="{{$data['school']}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="instructor">
                {{--อาจารย์--}}
                <h3>อาจารย์ผู้ควบคุมทีม</h3>
                <div class="row">
                    <div class="col-md-2 col-xs-4">
                        <div class="form-group">
                            <label>คำนำหน้าชื่อ</label>
                            <input type="text" class="form-control" placeholder="นาย" name="teacher_prefix" value="{{$data['teacher_prefix']}}" required>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-8">
                        <div class="form-group">
                            <label for="teacher_name">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ไอที" name="teacher_name" value="{{$data['teacher_name']}}" required>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <div class="form-group">
                            <label for="teacher_surname">นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="teacher_surname" value="{{$data['teacher_surname']}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="teacher_phone">เบอร์โทร</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="teacher_phone" value="{{$data['teacher_phone']}}" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="teacher_email">อีเมล</label>
                            <input type="email" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="teacher_email" value="{{$data['teacher_email']}}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="students">
                {{--สมาชิก--}}
                <h3>สมาชิก</h3>
                <h4>สมาชิก 1</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix[]" required>
                                        <option value="นาย" {{  ($data['prefix'][0] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['prefix'][0] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['prefix'][0] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ $data['name'][0] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ $data['surname'][0] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label>ระดับการศึกษา</label>
                            <select class="form-control" name="class[]" required>
                                <option value="4" {{  ($data['class'][0] == "4" ? "selected":"") }}>ม. 4</option>
                                <option value="5" {{  ($data['class'][0] == "5" ? "selected":"") }}>ม. 5</option>
                                <option value="6" selected="selected" {{  ($data['class'][0] == "6" ? "selected":"") }}>ม. 6</option>
                                <option value="0" {{  ($data['class'][0] == "0" ? "selected":"") }}>ปวช.</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>สมาชิก 2</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix[]" required>
                                        <option value="นาย" {{  ($data['prefix'][1] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['prefix'][1] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['prefix'][1] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ $data['name'][1] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ $data['surname'][1] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label>ระดับการศึกษา</label>
                            <select class="form-control" name="class[]" required>
                                <option value="4" {{  ($data['class'][1] == "4" ? "selected":"") }}>ม. 4</option>
                                <option value="5" {{  ($data['class'][1] == "5" ? "selected":"") }}>ม. 5</option>
                                <option value="6" selected="selected" {{  ($data['class'][1] == "6" ? "selected":"") }}>ม. 6</option>
                                <option value="0" {{  ($data['class'][1] == "0" ? "selected":"") }}>ปวช.</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>สมาชิก 3</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix[]" required>
                                        <option value="นาย" {{  ($data['prefix'][2] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['prefix'][2] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['prefix'][2] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ $data['name'][2] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ $data['surname'][2] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label>ระดับการศึกษา</label>
                            <select class="form-control" name="class[]" required>
                                <option value="4" {{  ($data['class'][2] == "4" ? "selected":"") }}>ม. 4</option>
                                <option value="5" {{  ($data['class'][2] == "5" ? "selected":"") }}>ม. 5</option>
                                <option value="6" selected="selected" {{  ($data['class'][2] == "6" ? "selected":"") }}>ม. 6</option>
                                <option value="0" {{  ($data['class'][2] == "0" ? "selected":"") }}>ปวช.</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--concept--}}
        <h3>แนวคิด</h3>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="concept">ชื่อแนวคิด</label>
                    <input type="text" class="form-control" placeholder="ชื่อแนวคิด" name="idea" value="{{$data['idea']}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="idea_desc">รายละเอียดแนวคิด</label>
                    <textarea name="idea_desc" id="idea_desc" class="form-control" cols="30" rows="10" required>{{ $data['idea_desc'] }}</textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </form>
@endsection
