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
    <form action="{{URL::route('backend.competition.esport.update', $data->id)}}" method="post">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        {{--ทีม--}}
        <h3>ชื่อทีม</h3>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <label for="teamName">ชื่อทีม</label>
                <input type="text" class="form-control" placeholder="ITKMITL" name="team_name" value="{{ $data['team_name'] }}" required>
            </div>
            <div class="col-md-6 col-xs-12">
                <label for="teamFb">เฟซบุ๊คที่สะดวกในการติดต่อทีม</label>
                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="team_fb" value="{{ $data['team_fb'] }}" required>
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
                <h3>โรงเรียน</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label for="school">โรงเรียน</label>
                            <input type="text" class="form-control" placeholder="ชื่อโรงเรียน" name="school" value ="{{$data['school']}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="schoolAddr">ที่อยู่</label>
                            <input type="text" class="form-control" placeholder="ที่อยู่โรงเรียน" name = "school_addr" value="{{$data['school_addr']}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="schoolProvince">จังหวัด</label>
                            <input type="text" class="form-control" placeholder="e.g. กรุงเทพ" name="school_province" value="{{$data['school_province']}}" required>
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
                            <label for="teacherName">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ไอที" name="teacher_name" value="{{$data['teacher_name']}}" required>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <div class="form-group">
                            <label for="teacherSurname">นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="teacher_surname" value="{{$data['teacher_surname']}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="teacherPhone">เบอร์โทร</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="teacher_phone" value="{{$data['teacher_phone']}}" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="teacher_email">อีเมล</label>
                            <input type="text" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="teacher_email" value="{{$data['teacher_email']}}" required>
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
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ $data['steam'][0] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ $data['facebook'][0] }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" required value="{{$data['phone'][0]}}">
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
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ $data['steam'][1] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]"  value="{{ $data['facebook'][1] }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{$data['phone'][1]}}" required>
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
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ $data['steam'][2] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{$data['facebook'][2]}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{$data['phone'][2]}}" required>
                        </div>
                    </div>
                </div>
                <h4>สมาชิก 4</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix[]" required>
                                        <option value="นาย" {{  ($data['prefix'][3] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['prefix'][3] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['prefix'][3] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ $data['name'][3] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ $data['surname'][3] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ $data['steam'][3] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ $data['facebook'][3] }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{$data['phone'][3]}}" required>
                        </div>
                    </div>
                </div>
                <h4>สมาชิก 5</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix[]" required>
                                        <option value="นาย" {{  ($data['prefix'][4] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['prefix'][4] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['prefix'][4] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ $data['name'][4] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ $data['surname'][4] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ $data['steam'][4] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ $data['facebook'][4] }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{$data['phone'][4]}}" required>
                        </div>
                    </div>
                </div>
                <h4>สำรอง 1</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="subPrefix[]">
                                        <option value="นาย" {{  ($data['subPrefix'][0] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['subPrefix'][0] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['subPrefix'][0] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="subName[]" value="{{ $data['subName'][0] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="subSurname[]" value="{{ $data['subSurname'][0] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="subSteam[]" value="{{ $data['subSteam'][0] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="subFacebook[]" value="{{ $data['subFacebook'][0] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="subPhone[]" value="{{$data['subPhone'][0]}}">
                        </div>
                    </div>
                </div>
                <h4>สำรอง 2</h4>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="subPrefix[]">
                                        <option value="นาย" {{  ($data['subPrefix'][1] == "นาย" ? "selected":"") }}>นาย</option>
                                        <option value="นาง" {{ ($data['subPrefix'][1] == "นาง" ? "selected":"") }}>นาง</option>
                                        <option value="นางสาว" {{ ($data['subPrefix'][1] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="subName[]" value="{{ $data['subName'][1] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="subSurname[]" value="{{ $data['subSurname'][1] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Steam</label>
                            <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="subSteam[]" value="{{ $data['subSteam'][1] }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="subFacebook[]" value="{{ $data['subFacebook'][1] }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="subPhone[]" value ="{{$data['subPhone'][1]}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </form>
@endsection
