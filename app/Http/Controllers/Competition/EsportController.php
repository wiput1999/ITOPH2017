<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EsportController extends Controller
{
    public function showRule() {
        return view('register.competition.esport_rule', ["title" => "การแข่งขันกีฬาอิเล็กทรอนิกส์ | "]);
    }
}
