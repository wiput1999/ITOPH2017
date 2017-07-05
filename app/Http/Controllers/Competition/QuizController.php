<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function showRule() {
        return view('register.competition.quiz_rule', ["title" => "การแข่งขันแก้ปัญหาเชิงวิเคราะห์ | "]);
    }
}
