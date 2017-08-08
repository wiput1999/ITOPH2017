@extends('register.partial')
@section('content')
    <div class="paper">
        @include('register.alert')
        <div class="container">
            <h1 class="h-light text-center">ลงทะเบียนเข้าชมงานสำหรับนักเรียน นักศึกษา</h1>
            <hr>
            <form action="{{URL('/register/guest_student')}}" method="post">
                {!! csrf_field() !!}
                <h3>ข้อมูลส่วนตัว</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group">
                                    <label>คำนำหน้าชื่อ</label>
                                    <select class="form-control" name="prefix" required="">
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="form-group">
                                    <label>ชื่อ</label>
                                    <input type="text" class="form-control" placeholder="ไอที" name="name" required="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname" required="" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>เพศ</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="M" required=""> ชาย
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="F" required=""> หญิง
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="U" required=""> ไม่ระบุ
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>อายุ</label>
                            <input type="number" class="form-control" placeholder="100" name="age" required="" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <label>ระดับการศึกษา</label>
                            <select class="form-control" name="major" required="">
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
                            <input type="text" class="form-control" placeholder="e.g. วิทย์-คณิต, ศิลป์-คำนวณ " name="branch" required="" value="">
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="form-group">
                            <label>ชั้นปี</label>
                            <input type="text" class="form-control" placeholder="e.g. ม.6" name="degree" required="" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>จังหวัด</label>
                            <input type="text" class="form-control" placeholder="e.g. กรุงเทพฯ" name="province" required="" value="">
                        </div>
                    </div>
                </div>

                <h3>ช่องทางการติดต่อ</h3>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="e.g. 080808xxxx" name="phone" required="" value="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>อีเมล</label>
                            <input type="text" class="form-control" placeholder="e.g. openhouse@it.kmitl.ac.th" name="email" required="" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" class="form-control" placeholder="e.g. fb.com/ITLadkrabangOpenhouse" name="facebook" value="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" class="form-control" placeholder="e.g. twitter.com/@ITKMITL" name="twitter" value="">
                        </div>
                    </div>
                </div>

                <h3>ข่าวสารจาก IT Ladkrabang Open House</h3>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="news" value="1">ฉันต้องการรับข้อมูลข่าวสารจากทีมงาน IT Ladkrabang Open House
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{--เวิร์กช้อปควย--}}
                <h3>คุณต้องการเข้าร่วม Workshop ประเภทใด</h3>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            <select name="workshop" class="form-control" required>
                                <option selected disabled>กรุณาเลือก</option>
                                <option value="none">ไม่ประสงค์จะเข้าร่วม</option>
                                <option value="multi">ขยับขับเคลื่อนด้วย AR</option>
                                <option value="network">เชื่อมต่อทุกสรรพสิ่งด้วย IoT</option>
                                <option value="softeng">ใส่กึ่นใส่เลโก้</option>
                                <option value="datasci">ตามหาโปเกม่อนด้วยวิทยาการข้อมูล</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{--end เวิร์กช้อป--}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">ลงทะเบียน</button>
                </div>
            </form>
        </div>
    </div>
@endsection