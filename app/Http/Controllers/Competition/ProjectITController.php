<?php

namespace App\Http\Controllers\Competition;

use App\Models\Project;
use App\Mail\MailCompetition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProjectITController extends Controller
{
    public function showRule() {
        return view('register.competition.projectit_rule', ["title" => "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย | "]);
    }

    public function showRegister() {
        return view('register.competition.projectit_register', ["title" => "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย | "]);
    }

    public function storeRegister(Request $request) {
        $inputs = $request->all();

        $rules = [
            'team_name'             => 'required',
            'name.*'				=> 'required',
            'surname.*'             => 'required',
            'school'				=> 'required',
            'teacher_prefix'        => 'required',
            'teacher_name'		    => 'required',
            'teacher_surname'		=> 'required',
            'teacher_phone'			=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'teacher_email'         => 'required|email',
            'idea'			        => 'required',
            'idea_desc'			    => 'required',
            'bizcanvas'			    => 'required|max:11240000|mimes:pdf',
            'storyboard'			=> 'required|max:11240000|mimes:pdf'
        ];

        $messages = [
            'team_name.required'             =>  'กรุณากรอก  ชื่อทีม',
            'name.*.required'                =>  'กรุณากรอก  ชื่อสมาชิก',
            'surname.*.required'             =>  'กรุณากรอก  นามสกุลของสมาชิก',
            'school.required'                =>  'กรุณากรอก  ชื่อโรงเรียน',
            'teacher_prefix.required'        =>  'กรุณากรอก  คำนำหน้าชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_name.required'          =>  'กรุณากรอก  ชื่ออาจารย์ผู้ควบคุมทีม',
            'teacher_surname.required'       =>  'กรุณากรอก  นามสกุลอาจารย์ผู้ควบคุมทีม',
            'teacher_phone.required'         =>  'กรุณากรอก  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม',
            'teacher_email.required'            =>  'กรุณากรอก  อีเมลอาจารย์ผู้ควบคุมทีม',
            'idea.required'                  =>  'กรุณากรอก  ชื่อแนวคิด',
            'idea_desc.required'             =>  'กรุณากรอก  รายละเอียดแนวคิด',
            'bizcanvas.required'             =>  'กรุณาอัปโหลด  Business Concept',
            'storyboard.required'            =>  'กรุณาอัปโหลด  Storyboard',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'bizcanvas.max'                  =>  'ขนาดไฟล์ Business Concept ต้องไม่เกิน 10 MB',
            'storyboard.max'                  =>  'ขนาดไฟล์ Storyboard ต้องไม่เกิน 10 MB',
            'bizcanvas.mimes'               => 'ไฟล์ Business Concept ต้องเป็น PDF เท่านั้น',
            'storyboard.mimes'               => 'ไฟล์ Storyboard ต้องเป็น PDF เท่านั้น'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/competition/project/register')->with(["title" => "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย  | "])->withInput()->withErrors($validator);
        }

        $project = new Project();
        $project->fill($request->all());

        $members = [];
        for ($i = 0; $i < 3; $i++){
            $member['prefix'] = $inputs['prefix'][$i];
            $member['name'] = $inputs['name'][$i];
            $member['surname'] = $inputs['surname'][$i];
            $member['class'] = $inputs['class'][$i];
            $members[] = $member;
        }
        $project->member = json_encode($members, JSON_UNESCAPED_UNICODE);

        $bizcanvas = $request->file('bizcanvas');
        $filename = $inputs["team_name"] . "_bizcanvas_" . str_random(10);
        Storage::disk('local')->put($filename.'.pdf',  File::get($bizcanvas));
        $project->bizcanvas = $filename;
        $storyboard = $request->file('storyboard');
        $filename = $inputs["team_name"] . "_storyboard_" . str_random(10);
        Storage::disk('local')->put($filename.'.pdf', File::get($storyboard));
        $project->storyboard = $filename;

        $remember = md5(time() . str_random(100));
        $project->remember = $remember;
        $project->save();

        $competition = 'projectit';

        $account['email'] = $request->input('teacher_email');
        $accounts[] = $account;

        \Mail::to($account['email'])->queue(new MailCompetition($inputs["teacher_name"], $project, $competition));

        return view('register.competition.projectit_register', ['success' => 1, "title" => "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย | "]);
    }
}
