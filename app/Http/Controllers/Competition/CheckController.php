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
    public function approved($type) {
        switch ($type) {
            case 'esport':
                $team = ESport::where('confirm', 1)->get();
                $typeName = "การแข่งขันกีฬาอิเล็กทรอนิกส์ (E-Sports)";
                break;
            case 'project':
                $team = Project::where('confirm', 1)->get();
                $typeName = "การประกวดโครงงานเทคโนโลยีสารสนเทศระดับมัธยมศึกษาตอนปลาย (High School IT Student Project Contest)";
                break;
            case 'network':
                $team = Network::where('confirm', 1)->get();
                $typeName = "การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ (Network Security)";
                break;
            case 'php':
                $team = Php::where('confirm', 1)->get();
                $typeName = "การแข่งขันพัฒนาเว็บไซต์ด้วย (PHP และ JavaScript)";
                break;
            case 'quiz':
                $team = Quiz::where('confirm', 1)->get();
                $typeName = "การแข่งขันแก้ปัญหาเชิงวิเคราะห์";
                break;
            default:
                dd("fuck you");
                break;
        }
        if (!isset($team)) {
            dd("fuck");
        }

        return view('register.approved', ['title' => 'ประกาศรายชื่อผู้มีสิทธิ์เข้าร่วมการแข่งขันทางวิชาการ | 
', 'teams' => $team, 'type' => $typeName]);
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
