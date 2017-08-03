<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\GuestSchool;
use Maatwebsite\Excel\Facades\Excel;

class RegisterSchoolController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $datas = GuestSchool::all();
        return view('backend.register.school.list', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.register.school.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $rules = [

            'prefix'				=> 'required',
            'name'					=> 'required',
            'surname'				=> 'required',
            'gender'				=> 'required|in:M,F,U',
            'age'					=> 'required|integer|between:1,100',

            'school'				=> 'required',
            'follower'				=> 'required|integer',

            'province'				=> 'required',
            'email'					=> 'required|email',
            'phone'					=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
            'workshop'				=> 'required|in:none,multi,network,softeng,datasci',
        ];

        $messages = [

            'prefix.required'		=> 'กรุณากรอก คำนำหน้าชื่อ',
            'name.required'			=> 'กรุณากรอก ชื่อ',
            'surname.required'		=> 'กรุณากรอก นามสกุล',
            'gender.required'		=> 'กรุณาเลือก เพศ',
            'gender.in'				=> 'เพศ ที่เลือกไม่ถูกต้อง',
            'age.required'			=> 'กรุณากรอก อายุ',
            'age.integer'			=> 'รูปแบบอายุไม่ถูกต้อง',
            'age.between'			=> 'อายุ ต้องอยู่ระหว่าง 1 ถึง 100',

            'school.required'		=> 'กรุณากรอก ชื่อโรงเรียน>',
            'follower.required'		=> 'กรุณากรอก จำนวนนักเรียนที่มาชมงาน',
            'follower.integer'		=> 'รูปแบบจำนวนนักเรียนที่มาชมงานไม่ถูกต้อง',

            'province.required'		=> 'กรุณากรอก จังหวัด',
            'email.required'		=> 'กรุณากรอก อีเมลล์',
            'email.email'			=> 'รูปแบบอีเมลไม่ถูกต้อง',
            'phone.required'		=> 'กรุณากรอก เบอร์โทรศัพท์',
            'phone.regex'			=> 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง',
            'workshop.required'     => 'กรุณาเลือก Workshop'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/backend/register/school/new')->withInput()->withErrors($validator);
        }

        $guestSchool = new GuestSchool();
        $guestSchool->fill($request->all());
        $guestSchool->facebook = empty($request->facebook)? null:$request->facebook;
        $guestSchool->twitter = empty($request->twitter)? null:$request->twitter;
        $guestSchool->save();

        return redirect('/backend/register/school');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.register.school.show', ['data' => GuestSchool::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.register.school.edit', ['data' => GuestSchool::find($id)]);
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
        $guestSchool = GuestSchool::find($id);

        $inputs = $request->all();

        $rules = [

            'prefix'				=> 'required',
            'name'					=> 'required',
            'surname'				=> 'required',
            'gender'				=> 'required|in:M,F,U',
            'age'					=> 'required|integer|between:1,100',

            'school'				=> 'required',
            'follower'				=> 'required|integer',

            'province'				=> 'required',
            'email'					=> 'required|email',
            'phone'					=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
        ];

        $messages = [

            'prefix.required'		=> 'กรุณากรอก คำนำหน้าชื่อ',
            'name.required'			=> 'กรุณากรอก ชื่อ',
            'surname.required'		=> 'กรุณากรอก นามสกุล',
            'gender.required'		=> 'กรุณาเลือก เพศ',
            'gender.in'				=> 'เพศ ที่เลือกไม่ถูกต้อง',
            'age.required'			=> 'กรุณากรอก อายุ',
            'age.integer'			=> 'รูปแบบอายุไม่ถูกต้อง',
            'age.between'			=> 'อายุ ต้องอยู่ระหว่าง 1 ถึง 100',

            'school.required'		=> 'กรุณากรอก ชื่อโรงเรียน>',
            'follower.required'		=> 'กรุณากรอก จำนวนนักเรียนที่มาชมงาน',
            'follower.integer'		=> 'รูปแบบจำนวนนักเรียนที่มาชมงานไม่ถูกต้อง',

            'province.required'		=> 'กรุณากรอก จังหวัด',
            'email.required'		=> 'กรุณากรอก อีเมลล์',
            'email.email'			=> 'รูปแบบอีเมลไม่ถูกต้อง',
            'phone.required'		=> 'กรุณากรอก เบอร์โทรศัพท์',
            'phone.regex'			=> 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง',
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/backend/register/school/'.$id.'/edit')->with(['data' => $inputs])->withErrors($validator);
        }

        $guestSchool->fill($request->all());
        $guestSchool->facebook = empty($request->facebook)? null:$request->facebook;
        $guestSchool->twitter = empty($request->twitter)? null:$request->twitter;
        $guestSchool->save();

        return redirect('/backend/register/school/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GuestSchool::find($id)->delete();
        return redirect('/backend/register/school');
    }

    public function excel() {
        return Excel::create('school_guest_export_' . time(), function($excel)
        {
            $excel->sheet('Sheet', function($sheet)
            {
                $datas = GuestSchool::all();
                $sheet->loadView('backend.register.school.excel', ['datas' => $datas]);
            });
        })->download('xls');
    }
}
