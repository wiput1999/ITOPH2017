<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Guest;
use Maatwebsite\Excel\Facades\Excel;

class RegisterCommonController extends Controller
{
    public function index() {
        $datas = Guest::all();
        return view('backend.register.common.list', ['datas' => $datas]);
    }

    public function show($id) {
        return view('backend.register.common.show', ['data' => Guest::find($id)]);
    }

    public function edit($id) {
        return view('backend.register.common.edit', ['data' => Guest::find($id)]);
    }

    public function update(Request $request, $id) {
        $guest = Guest::find($id);

        $inputs = $request->all();

        $rules = [

            'prefix'                => 'required',
            'name'					=> 'required',
            'surname'				=> 'required',
            'gender'				=> 'required|in:M,F,U',
            'age'					=> 'required|integer|between:1,100',
            'career'				=> 'required',
            'province'				=> 'required',
            'email'					=> 'required|email',
            'phone'					=> 'required|regex:/^0[0-9]{1,2}[0-9]{7}$/',
        ];

        $messages = [
            'prefix.required'		=> 'กรุณากรอก คำนำหน้าชื่อ',
            'name.required'			=> 'กรุณากรอก ชื่อ',
            'surname.required'		=> 'กรุณากรอก นามสกุล',
            'gender.required'		=> 'กรุณาเลือก เพศ>',
            'gender.in'				=> 'เพศที่เลือกไม่ถูกต้อง',
            'age.required'			=> 'กรุณากรอก อายุ',
            'age.integer'			=> 'รูปแบบอายุไม่ถูกต้อง',
            'age.between'			=> 'อายุต้องอยู่ระหว่าง 1 ถึง 100',

            'career.required'		=> 'กรุณากรอก อาชีพ',

            'province.required'		=> 'กรุณากรอก จังหวัด',
            'email.required'		=> 'กรุณากรอก อีเมลล์',
            'email.email'			=> 'รูปแบบอีเมลไม่ถูกต้อง',
            'phone.required'		=> 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.regex'			=> 'รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง'
        ];

        $validator = Validator::make($inputs, $rules, $messages);
        if($validator->fails()){
            return redirect('/backend/register/common/'.$id.'/edit')->with(['data' => $inputs])->withErrors($validator);
        }

        $guest->fill($request->all());
        $guest->facebook = empty($request->facebook)? null:$request->facebook;
        $guest->twitter = empty($request->twitter)? null:$request->twitter;
        $guest->save();

        return redirect('/backend/register/common/'.$id);
    }

    public function excel() {
        return Excel::create('common_guest_export_' . time(), function($excel)
        {
            $excel->sheet('Sheet', function($sheet)
            {
                $datas = Guest::all();
                $sheet->loadView('backend.register.common.excel', ['datas' => $datas]);
            });
        })->download('xls');
    }

    public function destroy($id) {
        Guest::find($id)->delete();
        return redirect('/backend/register/common');
    }
}
