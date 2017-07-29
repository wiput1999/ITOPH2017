<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ESport;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EsportController extends Controller
{
    public function index() {
        $datas = ESport::all();
        return view('backend.competition.list', ['datas' => $datas, 'type' => 1, 'typeText' => 'esport']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ESport::find($id);
        return view('backend.competition.show', ['data' => $data, 'typeName' => 'esport']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $esport = ESport::find($id);
        $esport->prefix = array_column($esport->member, 'prefix');
        $esport->name = array_column($esport->member, 'name');
        $esport->surname = array_column($esport->member, 'surname');
        $esport->steam = array_column($esport->member, 'steam');
        $esport->facebook = array_column($esport->member, 'facebook');
        $esport->phone = array_column($esport->member, 'phone');
        if (count($esport->member) >= 6) {
            $esport->subPrefix = array_slice(array_column($esport->member, 'prefix'), 5);
            $esport->subName = array_slice(array_column($esport->member, 'name'), 5);
            $esport->subSurname = array_slice(array_column($esport->member, 'surname'), 5);
            $esport->subSteam = array_slice(array_column($esport->member, 'steam'), 5);
            $esport->subFacebook = array_slice(array_column($esport->member, 'facebook'), 5);
            $esport->subPhone = array_slice(array_column($esport->member, 'phone'), 5);
        }
        return view('backend.competition.esport_edit', ['data' => $esport]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $esport = ESport::find($id);

        $inputs = $request->all();

        $rules = [
            'team_name'             => 'required',
            'team_fb'			    => 'required',
            'name.*'				=> 'required',
            'surname.*'             => 'required',
            'steam.*'               => 'required',
            'facebook.*'            => 'required',
            'phone.*'               => 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
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
            'teacher_email.required'            =>  'กรุณากรอก  อีเมลอาจารย์ผู้ควบคุมทีม',
            'phone.*.regex'                  =>  'รูปแบบ  เบอร์โทรศัพท์สมาชิก ไม่ถูกต้อง',
            'subPhone.*.regex'               =>  'รูปแบบ  เบอร์โทรศัพท์ตัวสำรอง ไม่ถูกต้อง',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้องม',
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/backend/competition/esport/edit/'.$id)->with(['data' => $inputs])->withErrors($validator);
        }

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
        $esport->save();

        return redirect('/backend/competition/esport/view/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ESport::find($id)->delete();
        return redirect('/backend/competition/esport');
    }

    public function excel() {
        return Excel::create('esport_competition_export_' . time(), function($excel)
        {
            $excel->sheet('Sheet', function($sheet)
            {
                $datas = ESport::all();
                $sheet->loadView('backend.competition.excel.esport', ['datas' => $datas]);
            });
        })->download('xls');
    }
}
