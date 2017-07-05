<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NetworkController extends Controller
{
    public function showRule() {
        return view('register.competition.network_rule', ["title" => "การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | "]);
    }
}
