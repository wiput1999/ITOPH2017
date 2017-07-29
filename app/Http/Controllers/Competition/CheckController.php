<?php

namespace App\Http\Controllers\Competition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ESport;
use App\Models\Quiz;
use App\Models\Php;
use App\Models\Network;
use App\Models\Project;


class CheckController extends Controller
{
    public function getCheck($type=null, $remember=null) {
        if (is_null($remember) || is_null($type)) {
            return redirect('/');
        }
        $team = null;
        switch ($type) {
            case 1:
                $team = ESport::where('remember', $remember)->first();
                break;
            case 2:
                $team = Quiz::where('remember', $remember)->first();
                break;
            case 3:
                $team = Network::where('remember', $remember)->first();
                break;
            case 4:
                $team = Php::where('remember', $remember)->first();
                break;
            case 5:
                $team = Project::where('remember', $remember)->first();
                break;
            default:
                return redirect('/');
        }
        return view('register.competition.check', ["title" => "สถานะลงทะเบียนการแข่งขัน | ","team" => $team]);
    }

    public function approved(Request $request, $type) {
        switch ($type) {
            case 'esport':
                $team = ESport::where('confirm', 1)->get();
                $typeName = "การแข่งกีฬาอิเล็กทรอนิกส์";
                break;
            case 'pitching':
                $team = Project::where('confirm', 1)->get();
                $typeName = "การแข่งขันการนำเสนอแนวคิดโครงงานไอที";
                break;
            case 'network':
                $team = Network::where('confirm', 1)->get();
                $typeName = "การแข่งความปลอดภัยของระบบคอมพิวเตอร์";
                break;
            case 'php':
                $team = Php::where('confirm', 1)->get();
                $typeName = "การแข่งพัฒนาเว็บไซต์";
                break;
            case 'quiz':
                $team = Quiz::where('confirm', 1)->get();
                $typeName = "การแข่งตอบปัญหา";
                break;
            default:
                dd("fuck you");
                break;
        }
        if (!isset($team)) {
            dd("fuck");
        }

        return view('new.approved', ['title' => 'ประกาศรายชื่อผู้มีสิทธิ์เข้าร่วมการแข่งขันทางวิชาการ
', 'datas' => $team, 'type' => $typeName]);
    }

    public function change(Request $request, $type, $id) {
        switch ($type) {
            case 'esport':
                $team = ESport::find($id);
                break;
            case 'pitching':
                $team = Project::find($id);
                break;
            case 'network':
                $team = Network::find($id);
                break;
            case 'php':
                $team = Php::find($id);
                break;
            case 'quiz':
                $team = Quiz::find($id);
                break;
            default:
                dd("fuck you");
                break;
        }
        if (!isset($team)) {
            return response()->json("fuck", 404);
        }
        $team->confirm = $request->confirm;
        $team->save();

        return response()->json($request->confirm);
    }
}
