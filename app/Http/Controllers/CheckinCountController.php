<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest, App\Models\GuestSchool, App\Models\GuestStudent;

class CheckinCountController extends Controller
{
    public function checkincount() {
        $guest = Guest::where('confirm', '<>', '')->count();
        $school = GuestSchool::where('confirm', '<>', '')->count();
        $student = GuestStudent::where('confirm', '<>', '')->count();

        $total = $guest + $school + $student;

        return response()->json([
            'guest' => $guest,
            'school' => $school,
            'student' => $student,
            'total' => $total
        ]);
    }

    public function showcount() {
        return view('checkincount');
    }
}
