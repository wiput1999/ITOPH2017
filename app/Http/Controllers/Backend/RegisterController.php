<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestStudent;
use App\Models\GuestSchool;
use App\Models\Guest;
use Carbon;
use DB;

class RegisterController extends Controller
{
    public function index() {
        $guest = Guest::all()->toArray();
        $guestStudent = GuestStudent::all()->toArray();
        $guestSchool = GuestSchool::all()->toArray();
        $datas = array_merge($guest, $guestSchool, $guestStudent);
        return view('backend.register.index', ['datas' => $datas]);
    }

    public function postCheckin($code) {
        $type = substr($code, 0, 1);
        $id = (int) substr($code, 1);

        switch ($type) {
            case 1:
                $guest = Guest::where('id', $id)->first();
                break;
            case 2:
                $guest = GuestStudent::where('id', $id)->first();
                break;
            case 3:
                $guest = GuestSchool::where('id', $id)->first();
                break;
            default:
                dd("fuck you");
        }
        if (isset($guest)) {
            if ($guest->confirm == null) {
                $guest->confirm = Carbon\Carbon::now();
                $guest->save();
                return redirect('/backend/register');
            }
            $guest->confirm = null;
            $guest->save();
        }
        return redirect('/backend/register');

    }

    public function postGift($code) {
        $type = substr($code, 0, 1);
        $id = (int) substr($code);

        switch ($type) {
            case 1:
                $guest = DB::table('guest')->where('id', $id)->first();
                break;
            case 2:
                $guest = DB::table('guest_student')->where('id', $id)->first();
                break;
            case 3:
                $guest = DB::table('guest_school')->where('id', $id)->first();
                break;
            default:
                dd("fuck you");
        }
        if (isset($guest)) {
            if ($guest->gift == null) {
                $guest->gift = Carbon\Carbon::now();
                $guest->save();
            } else {
                dd("fuck");
            }
        }
        return redirect('/backend/register');
    }
}
