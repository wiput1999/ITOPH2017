<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Network;
use Maatwebsite\Excel\Facades\Excel;


class NetworkController extends Controller
{
    public function index() {
        $datas = Network::all();
        return view('backend.competition.list', ['datas' => $datas, 'type' => 3, 'typeText' => 'network']);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Network::find($id);
        return view('backend.competition.show', ['data' => $data, 'typeName' => 'network']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $network = Network::find($id);
        $network->prefix = array_column($network->member, 'prefix');
        $network->name = array_column($network->member, 'name');
        $network->surname = array_column($network->member, 'surname');
        $network->class = array_column($network->member, 'class');
        $network->email = array_column($network->member, 'email');
        $network->phone = array_column($network->member, 'phone');
        return view('backend.competition.network_edit', ['data' => $network]);
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
        $network = Network::find($id);

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
            'email.*.email'                  =>  'รูปแบบ  อีเมลสมาชิก ไม่ถูกต้อง',
            'phone.*.regex'                  =>  'รูปแบบ  เบอร์โทรศัพท์สมาชิก ไม่ถูกต้อง',
            'teacher_email.email'            =>  'รูปแบบ  อีเมลอาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง',
            'teacher_phone.regex'            =>  'รูปแบบ  เบอร์โทรศัพท์อาจารย์ผู้ควบคุมทีม ไม่ถูกต้อง'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/register/competition/network/edit/'.$id)->with(['data' => $inputs])->withErrors($validator);
        }

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
        $network->save();

        return redirect('/backend/competition/network/view/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Network::find($id)->delete();
        return redirect('/backend/competition/network');
    }

    public function excel() {
        return Excel::create('network_competition_export_' . time(), function($excel)
        {
            $excel->sheet('Sheet', function($sheet)
            {
                $datas = Network::all();
                $sheet->loadView('backend.competition.excel.network', ['datas' => $datas]);
            });
        })->download('xls');
    }
}
