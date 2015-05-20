<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller {

	public function index(){
        $xkw_students = Students::all();
        $students = array();

        foreach($xkw_students as $xkw_student){
            array_push($students, array(
                'Sname' => iconv("GBK", "UTF-8", $xkw_student->Sname),
                'Sscore' => iconv("GBK", "UTF-8", $xkw_student->Sscore),
                'Sattitude' => iconv("GBK", "UTF-8", $xkw_student->Sattitude)
            ));


           // array_push($students, iconv("GBK", "UTF-8", $xkw_student->Sscore));
           // array_push($students, iconv("GBK", "UTF-8", $xkw_student->Sattitude));
        }
//dd($students);

        $grades = ClassGradeController::getGradesWithTitle();



        return view('students.index', compact('students', 'grades'));
    }

    public function getStudentsByGradeClass($grade, $class){

    }

}
