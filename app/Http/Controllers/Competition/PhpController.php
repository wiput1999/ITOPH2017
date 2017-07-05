<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhpController extends Controller
{
    public function showRule() {
        return view('register.competition.php_rule', ["title" => "การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | "]);
    }
}
