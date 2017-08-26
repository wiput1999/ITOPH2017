<?php

namespace App\Http\Controllers\Competition;

use App\Models\Php;
use App\Mail\MailCompetition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PhpController extends Controller
{
    public function showRule() {
        return view('register.competition.php_rule', ["title" => "การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | "]);
    }

    public function showRegister() {
        return view('register.competition.php_register', ["title" => "การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | "]);
    }

    public function storeRegister(Request $request) {
        $inputs = $request->all();

        $rules = [
            'team_name'             => 'required',
            'name.*'				=> 'required',
            'surname.*'             => 'required',
            'email.*'               => 'required|email',
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
            'school.required'                =>  'กรุณากรอก  ชื่อโรงเรียน',
            'school_addr.required'           =>  'กรุณากรอก  ที่อยู่โรงเรียน',
            'school_province.required'       =>  'กรุณากรอก  จังหวัด',
            'teacher_prefix.required'        =>  'กรุณากรอก  คำนำหน้าชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_name.required'          =>  'กรุณากรอก  ชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_surname.required'       =>  'กรุณากรอก  นามสกุลอาจารย์ผู้ควบคุมทีม',
            'teacher_phone.required'         =>  'กรุณากรอก  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม',
            'teacher_email.required'            =>  'กรุณากรอก  อีเมลอาจารย์ผู้ควบคุมทีม',
            'email.*.email'                  =>  'รูปแบบ  อีเมลสมาชิก ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/competition/php/register')->with(["title" => "การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | "])->withInput()->withErrors($validator);
        }

        $php = new Php();
        $php->fill($request->all());

        $members = [];
        for ($i = 0; $i < 2; $i++){
            $member['prefix'] = $inputs['prefix'][$i];
            $member['name'] = $inputs['name'][$i];
            $member['surname'] = $inputs['surname'][$i];
            $member['class'] = $inputs['class'][$i];
            $member['email'] = $inputs['email'][$i];
            $members[] = $member;
        }

        $php->member = json_encode($members, JSON_UNESCAPED_UNICODE);

        $remember = md5(time() . str_random(100));
        $php->remember = $remember;
        $php->save();

        //add teacher to accounts for send mail
        $account['email'] = $request->input('teacher_email');

        $competition = "php";

        \Mail::to($account['email'])->send(new MailCompetition($inputs["teacher_name"], $php, $competition));

        for ($i = 0; $i < 2; $i++) {
            \Mail::to($inputs['email'][$i])->send(new MailCompetition($inputs['name'][$i], $php, $competition));
        }

        return view('register.competition.php_register', ['success' => 1, "title" => "การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | "]);
    }
}
