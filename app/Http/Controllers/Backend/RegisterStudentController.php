<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\GuestStudent;

class RegisterStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = GuestStudent::all();
        return view('backend.register.student.list', ['datas' => $datas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.register.student.show', ['data' => GuestStudent::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.register.student.edit', ['data' => GuestStudent::find($id)]);
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
        $guestStudent = GuestStudent::find($id);

        $inputs = $request->all();

        $rules = [
            'prefix'				=> 'required',
            'name'					=> 'required',
            'surname'				=> 'required',
            'gender'				=> 'required|in:M,F,U',
            'age'					=> 'required|integer|between:1,100',

            'major'					=> 'required',
            'branch'				=> 'required',
            'degree'				=> 'required',

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
            'age.between'			=> 'อายุต้องอยู่ระหว่าง 1 ถึง 100',

            'major.required'		=> 'กรุณาเลือกระดับการศึกษา',
            'branch.required'		=> 'กรุณากรอก แผนการเรียน/สาขาวิชา',
            'degree.required'		=> 'กรุณากรอก ชั้นปี',

            'province.required'		=> 'กรุณากรอก จังหวัด',
            'email.required'		=> 'กรุณากรอก อีเมลล์',
            'email.email'			=> 'รูปแบบอีเมลไม่ถูกต้อง',
            'phone.required'		=> 'กรุณา กรอกเบอร์โทรศัพท์',
            'phone.regex'			=> 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง',
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/backend/register/student/'.$id.'/edit')->with(['data' => $inputs])->withErrors($validator);
        }

        $guestStudent->fill($request->all());
        $guestStudent->facebook = empty($request->facebook)? null:$request->facebook;
        $guestStudent->twitter = empty($request->twitter)? null:$request->twitter;
        $guestStudent->save();

        return redirect('/backend/register/student/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GuestStudent::find($id)->delete();
        return redirect('/backend/register/student');
    }

    public function excel() {
        return Excel::create('student_guest_export_' . time(), function($excel)
        {
            $excel->sheet('Sheet', function($sheet)
            {
                $datas = GuestStudent::all();
                $sheet->loadView('backend.register.student.excel', ['datas' => $datas]);
            });
        })->download('xls');
    }
}
