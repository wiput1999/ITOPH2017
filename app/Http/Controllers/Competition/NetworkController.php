<?php

namespace App\Http\Controllers\Competition;

use App\Models\Network;
use App\Mail\MailCompetition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NetworkController extends Controller
{
    public function showRule() {
        return view('register.competition.network_rule', ["title" => "การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | "]);
    }

    public function showRegister() {
        return view('register.competition.network_register', ["title" => "การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | "]);
    }

    public function storeRegister(Request $request) {
        $inputs = $request->all();

        $rules = [
            'team_name'             => 'required',
            'name.*'				=> 'required',
            'surname.*'             => 'required',
            'email.*'               => 'required|email',
            'phone.*'               => 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'school'				=> 'required',
            'school_addr'			=> 'required',
            'school_province'		=> 'required',
            'teacher_prefix'        => 'required',
            'teacher_name'		    => 'required',
            'teacher_surname'		=> 'required',
            'teacher_email'         => 'required|email',
            'teacher_phone'			=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/'
        ];

        $messages = [
            'team_name.required'             =>  'กรุณากรอก  ชื่อทีม',
            'name.*.required'                =>  'กรุณากรอก  ชื่อสมาชิก',
            'surname.*.required'             =>  'กรุณากรอก  นามสกุลของสมาชิก',
            'email.*.required'               =>  'กรุณากรอก  อีเมลของสมาชิก',
            'phone.*.required'               =>  'กรุณากรอก  เบอร์โทรศัพท์ของสมาชิก',
            'school.required'                =>  'กรุณากรอก  ชื่อโรงเรียน',
            'school_addr.required'           =>  'กรุณากรอก  ที่อยู่โรงเรียน',
            'school_province.required'       =>  'กรุณากรอก  จังหวัด',
            'teacher_prefix.required'        =>  'กรุณากรอก  คำนำหน้าชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_name.required'          =>  'กรุณากรอก  ชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_surname.required'       =>  'กรุณากรอก  นามสกุลอาจารย์ผู้ควบคุมทีม',
            'teacher_phone.required'         =>  'กรุณากรอก  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม',
            'teacher_email.required'         =>  'กรุณากรอก  อีเมลอาจารย์ผู้ควบคุมทีม',
            'rank.integer'                   =>  'รูปแบบ  อันดับทีม ไม่ถูกต้อง',
            'rank.between'                   =>  'อันดับทีมต้องอยู่ระหว่าง 1 ถึง 100',
            'email.*.email'                  =>  'รูปแบบ  อีเมลสมาชิก ไม่ถูกต้อง',
            'phone.*.regex'                  =>  'รูปแบบ  เบอร์โทรศัพท์สมาชิก ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/competition/network/register')->with(["title" => "การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | "])->withInput()->withErrors($validator);
        }

        $network = new Network();
        $network->fill($request->all());

        $members = [];
        for ($i = 0; $i < 2; $i++){
            $member['prefix'] = $inputs['prefix'][$i];
            $member['name'] = $inputs['name'][$i];
            $member['surname'] = $inputs['surname'][$i];
            $member['class'] = $inputs['class'][$i];
            $member['email'] = $inputs['email'][$i];
            $member['phone'] = $inputs['phone'][$i];
            $members[] = $member;
        }

        $network->member = json_encode($members, JSON_UNESCAPED_UNICODE);

        $remember = md5(time() . str_random(100));
        $network->remember = $remember;
        $network->save();

        $competition = 'network';

        //add teacher to accounts for send mail
        $account['email'] = $request->input('teacher_email');

        \Mail::to($account['email'])->send(new MailCompetition($inputs["teacher_name"], $network, $competition));

        for ($i = 0; $i < 2; $i++) {
            \Mail::to($inputs['email'][$i])->send(new MailCompetition($inputs['name'][$i], $network, $competition));
        }

        return view('register.competition.network_register', ['success' => 1, "title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "]);
    }
}
