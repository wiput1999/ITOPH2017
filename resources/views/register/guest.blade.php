@extends('register.partial')
@section('content')
    <div class="paper">
        <div class="container">
            <h1 class="h-light text-center">ลงทะเบียนเข้าชมงานสำหรับบุคคลทั่วไป</h1>
            <hr>
            <form action="{{URL('/register/guest')}}" method="post">
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
                                    <input type="text" class="form-control" placeholder="ไอที" name="name" value="" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" class="form-control" placeholder="ลาดกระบัง" name="surname" value="" required="">
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
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group">
                            <label>อาชีพ</label>
                            <input type="text" class="form-control" placeholder="e.g. เจ้าของStartupชั้นนำของเมืองไทย" name="career" required="" value="">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">ลงทะเบียน</button>
                </div>
            </form>
        </div>
    </div>
@endsection