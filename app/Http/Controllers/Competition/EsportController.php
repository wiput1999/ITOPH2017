<?php

namespace App\Http\Controllers\Competition;

use App\Models\ESport;
use App\Mail\MailCompetition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EsportController extends Controller
{
    public function showRule() {
        return view('register.competition.esport_rule', ["title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "]);
    }

    public function showRegister() {
        return view('register.competition.esport_register', ["title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "]);
    }

    public function storeRegister(Request $request) {
        $inputs = $request->all();

        $rules = [
            'team_name'             => 'required',
            'team_fb'			    => 'required',
            'name.*'				=> 'required',
            'surname.*'             => 'required',
            'steam.*'               => 'required',
            'facebook.*'            => 'required',
            'phone.*'               => 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'subName.*'             => 'required',
            'subSurname.*'          => 'required',
            'subSteam.*'            => 'required',
            'subFacebook.*'         => 'required',
            'subPhone.*'            => 'regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'school'				=> 'required',
            'school_addr'			=> 'required',
            'school_province'		=> 'required',
            'teacher_prefix'        => 'required',
            'teacher_name'		    => 'required',
            'teacher_surname'		=> 'required',
            'teacher_phone'			=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'teacher_email'         => 'required|email'
        ];

        $messages = [
            'team_name.required'             =>  'กรุณากรอก  ชื่อทีม',
            'team_fb.required'               =>  'กรุณากรอก  facebook ที่สามารถติดต่อทีม',
            'name.*.required'                =>  'กรุณากรอก  ชื่อสมาชิก',
            'surname.*.required'             =>  'กรุณากรอก  นามสกุลของสมาชิก',
            'steam.*.required'               =>  'กรุณากรอก  steam ของสมาชิก',
            'facebook.*.required'            =>  'กรุณากรอก  facebook ของสมาชิก',
            'phone.*.required'               =>  'กรุณากรอก  เบอร์โทรศัพท์ของสมาชิก',
            'school.required'                =>  'กรุณากรอก  ชื่อโรงเรียน',
            'school_addr.required'           =>  'กรุณากรอก  ที่อยู่โรงเรียน',
            'school_province.required'       =>  'กรุณากรอก  จังหวัด',
            'teacher_prefix.required'        =>  'กรุณากรอก  คำนำหน้าชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_name.required'          =>  'กรุณากรอก  ชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_surname.required'       =>  'กรุณากรอก  นามสกุลอาจารย์ผู้ควบคุมทีม',
            'teacher_phone.required'         =>  'กรุณากรอก  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม',
            'teacher_email.required'         =>  'กรุณากรอก  อีเมลอาจารย์ผู้ควบคุมทีม',
            'phone.*.regex'                  =>  'รูปแบบ  เบอร์โทรศัพท์สมาชิก ไม่ถูกต้อง',
            'subName.*.required'             =>  'กรุณากรอก  ชื่อตัวสำรอง',
            'subSurname.*.required'             =>  'กรุณากรอก  นามสกุลของตัวสำรอง',
            'subSteam.*.required'            =>  'กรุณากรอก  steam ของตัวสำรอง',
            'subFacebook.*.required'         =>  'กรุณากรอก  facebook ของตัวสำรอง',
            'subPhone.*.regex'               =>  'รูปแบบ  เบอร์โทรศัพท์ตัวสำรอง ไม่ถูกต้อง',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้องม',
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/competition/esport/register')->with(["title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "])->withInput()->withErrors($validator);
        }

        $esport = new ESport();
        $esport->fill($request->all());

        $members = [];
        for ($i = 0; $i < 5; $i++){
            $member['prefix'] = $inputs['prefix'][$i];
            $member['name'] = $inputs['name'][$i];
            $member['surname'] = $inputs['surname'][$i];
            $member['steam'] = $inputs['steam'][$i];
            $member['facebook'] = $inputs['facebook'][$i];
            $member['phone'] = $inputs['phone'][$i];
            $members[] = $member;
        }

        if ($inputs['subName'][0] != "" || $inputs['subName'][1] != "") {
            for ($i = 0; $i < 2; $i++){
                if ($inputs['subName'][$i] == "") continue;
                $member['prefix'] = $inputs['subPrefix'][$i];
                $member['name'] = $inputs['subName'][$i];
                $member['surname'] = $inputs['subSurname'][$i];
                $member['steam'] = $inputs['subSteam'][$i];
                $member['facebook'] = $inputs['subFacebook'][$i];
                $member['phone'] = $inputs['subPhone'][$i];
                $members[] = $member;
            }
        }

        $esport->member = json_encode($members, JSON_UNESCAPED_UNICODE);

        $remember = md5(time() . str_random(100));
        $esport->remember = $remember;
        $esport->save();

        $competition = "esport";

        \Mail::to($inputs['teacher_email'])->send(new MailCompetition($inputs["teacher_name"] ,$esport, $competition));

        return view('register.competition.esport_register', ['success' => 1, "title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "]);
    }
}
