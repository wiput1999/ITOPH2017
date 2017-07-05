<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function createGuestRegister() {
        return view('register.guest', ["title" => "Register | "]);
    }

    public function createGuestStudentRegister() {
        return view('register.guest_student', ["title" => "Register | "]);
    }

    public function createGuestSchoolRegister() {
        return view('register.guest_school', ["title" => "Register | "]);
    }
}
