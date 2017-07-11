@extends('register.partial')
@section('content')
    <div class="paper">
        <div class="container">
            <section class="regis-header">
                <h1 class="text-center">การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย <br> (High School IT Student Project Contest)</h1>
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
                <form action="{{url('/competition/project/register')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{--ทีม--}}
                    <h3>ชื่อทีม</h3>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <label for="team_name">ชื่อทีม</label>
                            <input type="text" class="form-control" placeholder="ITKMTIL" name="team_name" value="{{old('team_name')}}" required>
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
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label>ระดับการศึกษา</label>
                                <select class="form-control" name="class[]" required>
                                    <option value="4" {{  (old('class')[0] == "4" ? "selected":"") }}>ม. 4</option>
                                    <option value="5" {{  (old('class')[0] == "5" ? "selected":"") }}>ม. 5</option>
                                    <option value="6" selected="selected" {{  (old('class')[0] == "6" ? "selected":"") }}>ม. 6</option>
                                    <option value="0" {{  (old('class')[0] == "0" ? "selected":"") }}>ปวช.</option>
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
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label>ระดับการศึกษา</label>
                                <select class="form-control" name="class[]" required>
                                    <option value="4" {{  (old('class')[1] == "4" ? "selected":"") }}>ม. 4</option>
                                    <option value="5" {{  (old('class')[1] == "5" ? "selected":"") }}>ม. 5</option>
                                    <option value="6" selected="selected" {{  (old('class')[1] == "6" ? "selected":"") }}>ม. 6</option>
                                    <option value="0" {{  (old('class')[1] == "0" ? "selected":"") }}>ปวช.</option>
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
                        <div class="col-md-4 col-xs-6">
                            <div class="form-group">
                                <label>ระดับการศึกษา</label>
                                <select class="form-control" name="class[]" required>
                                    <option value="4" {{  (old('class')[2] == "4" ? "selected":"") }}>ม. 4</option>
                                    <option value="5" {{  (old('class')[2] == "5" ? "selected":"") }}>ม. 5</option>
                                    <option value="6" selected="selected" {{  (old('class')[2] == "6" ? "selected":"") }}>ม. 6</option>
                                    <option value="0" {{  (old('class')[2] == "0" ? "selected":"") }}>ปวช.</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{--end ข้อมูลส่วนตัว--}}

                    {{--สถานศึกษา--}}
                    <h3>สถานศึกษา</h3>
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <label for="school">โรงเรียน</label>
                                <input type="text" class="form-control" placeholder="ชื่อโรงเรียน" name="school" value="{{old('school')}}" required>
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
                                <label for="teacher_name">ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ไอที" name="teacher_name" value="{{old('teacher_name')}}" required>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="form-group">
                                <label for="teacher_surname">นามสกุล</label>
                                <input type="text" class="form-control" placeholder="ลาดกระบัง" name="teacher_surname" value="{{old('teacher_surname')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="teacher_phone">เบอร์โทร</label>
                                <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="teacher_phone" value="{{old('teacher_phone')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="teacher_email">อีเมล</label>
                                <input type="email" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="teacher_email" value="{{old('teacher_email')}}" required>
                            </div>
                        </div>
                    </div>

                    {{--concept--}}
                    <h3>แนวคิด</h3>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="concept">ชื่อแนวคิด</label>
                                <input type="text" class="form-control" placeholder="ชื่อแนวคิด" name="idea" value="{{old('idea')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="idea_desc">รายละเอียดแนวคิด</label>
                                <textarea name="idea_desc" id="idea_desc" class="form-control" cols="30" rows="10" required>{{ old('idea_desc') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="bizcanvas">Business Concept</label>
                                <input type="file" id="bizcanvas" name="bizcanvas" accept="application/pdf"  required>
                                <p>ไฟล์ประเภท PDF เท่านั้น ขนาดไม่เกิน 10MB</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="storyboard">Storyboard</label>
                                <input type="file" id="storyboard" name="storyboard" accept="application/pdf" required>
                                <p>ไฟล์ประเภท PDF เท่านั้น ขนาดไม่เกิน 10MB</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block regis-btn">ลงทะเบียน</button>
                </form>
            </section>
        </div>
    </div>
@endsection