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
    <form action="{{URL::route('backend.register.student.update', $data->id)}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        {{--ข้อมูลส่วนตัว--}}
        <h3>ข้อมูลส่วนตัว</h3>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="form-group">
                            <label>คำนำหน้าชื่อ</label>
                            <select class="form-control" name="prefix" required>
                                <option value="นาย" {{  ($data['prefix'] == "นาย" ? "selected":"") }}>นาย</option>
                                <option value="นาง" {{ ($data['prefix'] == "นาง" ? "selected":"") }}>นาง</option>
                                <option value="นางสาว" {{ ($data['prefix'] == "นางสาว" ? "selected":"") }}>นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ไอที" name="name" required value="{{ $data['name'] }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>นามสกุล</label>
                    <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname" required value="{{ $data['surname'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label >เพศ</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="M" required {{ $data['gender'] == 'M' ? "checked":"" }}> ชาย
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="F" required {{ $data['gender'] == 'F' ? "checked":"" }}> หญิง
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="U" required {{ $data['gender'] == 'U' ? "checked":"" }}> ไม่ระบุ
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>อายุ</label>
                    <input type="number" class="form-control" placeholder="100" name="age" required value="{{ $data['age'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label>ระดับการศึกษา</label>
                    <select class="form-control" name="major" required>
                        <option value="ประถมศึกษา">ประถมศึกษา</option>
                        <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                        <option value="มัธยมศึกษาตอนปลาย" selected="selected">มัธยมศึกษาตอนปลาย</option>
                        <option value="อาชีวศึกษา">อาชีวศึกษา</option>
                        <option value="ปริญญาตรี">ปริญญาตรี</option>
                        <option value="ปริญญาโท">ปริญญาโท</option>
                        <option value="ปริญญาเอก">ปริญญาเอก</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    <label>แผนการเรียน</label>
                    <input type="text" class="form-control" placeholder="e.g. วิทย์-คณิต, ศิลป์-คำนวณ " name="branch" required value="{{ $data['branch'] }}">
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="form-group">
                    <label>ชั้นปี</label>
                    <input type="text" class="form-control" placeholder="e.g. ม.6" name="degree" required value="{{ $data['degree'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" placeholder="e.g. กรุงเทพฯ" name="province" required value="{{ $data['province'] }}">
                </div>
            </div>
        </div>
        {{--end ข้อมูลส่วนตัว--}}

        {{--ช่องทางการติดต่อ--}}
        <h3>ช่องทางการติดต่อ</h3>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone" required value="{{ $data['phone'] }}">
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>อีเมล</label>
                    <input type="text" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="email" required value="{{ $data['email'] }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook" value="{{ $data['facebook'] }}">
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Twitter</label>
                    <input type="text" class="form-control" placeholder="e.g. twitter.com/@ITKMITL" name="twitter" value="{{ $data['twitter'] }}">
                </div>
            </div>
        </div>
        {{--end ช่องทางการติดต่อ--}}

        {{--รับข่าวสาร--}}
        <h3>ข่าวสารจาก IT Ladkrabang Open House</h3>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="news" value="1" {{ $data['news']=="1" ? "checked":"" }}>ฉันต้องการรับข้อมูลข่าวสารจากทีมงาน IT Ladkrabang Open House
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {{--end รับข่าวสาร--}}
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
    </form>
@endsection
