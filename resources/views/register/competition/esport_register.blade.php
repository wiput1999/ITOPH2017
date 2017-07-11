@extends('register.partial')
@section('content')
    <div class="paper">
        <div class="container">
            <section class="regis-header">
                <h1 class="text-center">ลงทะเบียนการแข่งขันกีฬาอิเล็กทรอนิกส์ (E-Sports)</h1>
                <h2 class="text-center"><small>วันที่ 1 กันยายน 2560</small></h2>
            </section>
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
                @if(isset($success))
                    <div class="alert alert-success" role="alert">
                        บันทึกข้อมูลสำเร็จ ระบบได้ส่งรายละเอียดการสมัครไปทางอีเมลเรียบร้อยแล้ว หากไม่พบอีเมล กรุณาตรวจสอบใน Spam หรือ Junk Box
                    </div>
                @endif
            </section>
            <section class="regis-form">

                <form action="{{url('/competition/esport/register')}}" method="post">

                    {!! csrf_field() !!}
                    {{--ทีม--}}
                    <h3>ชื่อทีม</h3>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <label for="teamName">ชื่อทีม</label>
                            <input type="text" class="form-control" placeholder="ITKMITL" name="team_name" value="{{ old('team_name') }}" required>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label for="teamFb">เฟซบุ๊คที่สะดวกในการติดต่อทีม</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="team_fb" value="{{ old('team_fb') }}" required>
                        </div>
                    </div>
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
                                            <option value="นาย" {{  (old('prefix')[0] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('prefix')[0] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('prefix')[0] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ old('name')[0] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>

                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ old('surname')[0] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ old('steam')[0] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ old('facebook')[0] }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" required value="{{old('phone')[0]}}">
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
                                            <option value="นาย" {{  (old('prefix')[1] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('prefix')[1] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('prefix')[1] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ old('name')[1] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ old('surname')[1] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ old('steam')[1] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]"  value="{{ old('facebook')[1] }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{old('phone')[1]}}" required>
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
                                            <option value="นาย" {{  (old('prefix')[2] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('prefix')[2] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('prefix')[2] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ old('name')[2] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ old('surname')[2] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ old('steam')[2] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{old('facebook')[2]}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{old('phone')[2]}}" required>
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
                                            <option value="นาย" {{  (old('prefix')[3] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('prefix')[3] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('prefix')[3] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ old('name')[3] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ old('surname')[3] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ old('steam')[3] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ old('facebook')[3] }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{old('phone')[3]}}" required>
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
                                            <option value="นาย" {{  (old('prefix')[4] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('prefix')[4] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('prefix')[4] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="name[]" required value="{{ old('name')[4] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname[]" required value="{{ old('surname')[4] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="steam[]" required value="{{ old('steam')[4] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook[]" value="{{ old('facebook')[4] }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone[]" value="{{old('phone')[4]}}" required>
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
                                            <option value="นาย" {{  (old('subPrefix')[0] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('subPrefix')[0] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('subPrefix')[0] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="subName[]" value="{{ old('subName')[0] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="subSurname[]" value="{{ old('subSurname')[0] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="subSteam[]" value="{{ old('subSteam')[0] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="subFacebook[]" value="{{ old('subFacebook')[0] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="subPhone[]" value="{{old('subPhone')[0]}}">
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
                                            <option value="นาย" {{  (old('subPrefix')[1] == "นาย" ? "selected":"") }}>นาย</option>
                                            <option value="นาง" {{ (old('subPrefix')[1] == "นาง" ? "selected":"") }}>นาง</option>
                                            <option value="นางสาว" {{ (old('subPrefix')[1] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label>ชื่อ</label>
                                        <input type="text" class="form-control" placeholder="ไอที" name="subName[]" value="{{ old('subName')[1] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="subSurname[]" value="{{ old('subSurname')[1] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Steam</label>
                                <input type="text" class="form-control" placeholder="e.g. https://steamcommunity.com/id/itkmitl" name="subSteam[]" value="{{ old('subSteam')[1] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>facebook</label>
                                <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="subFacebook[]" value="{{ old('subFacebook')[1] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="phone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="subPhone[]" value ="{{old('subPhone')[1]}}">
                            </div>
                        </div>
                    </div>

                    {{--end ข้อมูลส่วนตัว--}}

                    {{--สถานศึกษา--}}
                    <h3>โรงเรียน</h3>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <label for="school">โรงเรียน</label>
                                <input type="text" class="form-control" placeholder="ชื่อโรงเรียน" name="school" value ="{{old('school')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="schoolAddr">ที่อยู่</label>
                                <input type="text" class="form-control" placeholder="ที่อยู่โรงเรียน" name = "school_addr" value="{{old('school_addr')}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="schoolProvince">จังหวัด</label>
                                <input type="text" class="form-control" placeholder="e.g. กรุงเทพ" name="school_province" value="{{old('school_province')}}" required>
                            </div>
                        </div>
                    </div>

                    {{--อาจารย์--}}
                    <h3>อาจารย์ผู้ควบคุมทีม</h3>
                    <div class="row">
                        <div class="col-md-2 col-xs-4">
                            <div class="form-group">
                                <label>คำนำหน้าชื่อ</label>
                                <input type="text" class="form-control" placeholder="นาย" name="teacher_prefix" value="{{old('teacher_prefix')}}" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-8">
                            <div class="form-group">
                                <label for="teacherName">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ไอที" name="teacher_name" value="{{old('teacher_name')}}" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="teacherSurname">นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="teacher_surname" value="{{old('teacher_surname')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="teacherPhone">เบอร์โทร</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="teacher_phone" value="{{old('teacher_phone')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="teacher_email">อีเมล</label>
                                <input type="text" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="teacher_email" value="{{old('teacher_email')}}" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block regis-btn">ลงทะเบียน</button>
                </form>
            </section>
        </div>
    </div>

@endsection