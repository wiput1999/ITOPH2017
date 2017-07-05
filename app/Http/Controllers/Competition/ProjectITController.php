<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectITController extends Controller
{
    public function showRule() {
        return view('register.competition.projectit_rule', ["title" => "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย | "]);
    }
}
