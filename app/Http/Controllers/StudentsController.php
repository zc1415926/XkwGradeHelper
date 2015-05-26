<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\XkwStudents;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller {

	public function index(){
        $xkw_students = XkwStudents::all();
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

    public function getStudentsByGradeClass($grade, $class)
    {
        //$xkw_students = XkwStudents::get()->where('Sgrade', $grade)->where('Sclass', $class);
        $students = Students::get()->where('grade', $grade)->where('class', $class);
        $return_students = array();

        foreach($students as $student){
            //dd(iconv("GBK", "UTF-8", $student['name']));
            array_push($return_students, array(
                'grade' => $grade,
                'class' => $class,
                'name' => iconv("GBK", "UTF-8", $student['name']),
                'score' => iconv("GBK", "UTF-8", $student['score']),
                'attitude' => iconv("GBK", "UTF-8", $student['attitude']),
                'sum' => iconv("GBK", "UTF-8", $student['sum']),
                'score_to_grade' => iconv("GBK", "UTF-8", $student['score_to_grade'])
            ));
        }

/*
        if (count($xkw_students) == 0) {

        } else {
            foreach ($xkw_students as $xkw_student) {
                array_push($students, array(
                    'Sname' => iconv("GBK", "UTF-8", $xkw_student->Sname),
                    'Sscore' => iconv("GBK", "UTF-8", $xkw_student->Sscore),
                    'Sattitude' => iconv("GBK", "UTF-8", $xkw_student->Sattitude)
                ));
            }
        }*/

        //从sqlserver里读取数据后，转存到mysql里一次，并添加一个刷新按钮


        return $return_students;
    }

    public function sync(){
        /*可以取出Sattitude
        $ss = XkwStudents::where('Sgrade', 5)->where('Sclass', 7)->get();
        $os = array();
        foreach ($ss as $s) {
array_push($os, $s->Sattitude);
        }
dd($os);*/

        $xkw_students = XkwStudents::all();
//  先清除之前的数据
        Students::truncate();
        //$sum = 0;

        foreach ($xkw_students as $xkw_student) {
            //$sum = $xkw_student->Sscore + $xkw_student->Sattitude;



            Students::create(array(
                'grade' => $xkw_student->Sgrade,
                'class' => $xkw_student->Sclass,
                'name' => $xkw_student->Sname,
                'score' => $xkw_student->Sscore,
                'attitude' => $xkw_student->Sattitude,
                //总分如果是负的，那么就当成是0分，因为总分是unsigned tiny integer
                'sum' => $xkw_student->Sscore + $xkw_student->Sattitude,
                'score_to_grade' => ''
            ));
            /*array_push($students, array(
                'Sname' => iconv("GBK", "UTF-8", $xkw_student->Sname),
                'Sscore' => iconv("GBK", "UTF-8", $xkw_student->Sscore),
                'Sattitude' => iconv("GBK", "UTF-8", $xkw_student->Sattitude)
            ));*/
        }

        return 'finish';
    }

    public static function updateScoreToGrade($standard){

             Students::where('grade', $standard['grade'])->
                 where('class', $standard['class'])->
                 where('sum', '<', $standard['standard-D-down'])->
                 update(['score_to_grade' => 'D']);

             Students::where('grade', $standard['grade'])->
                 where('class', $standard['class'])->
                 where('sum', '<', $standard['standard-C-up'])->
                 where('sum', '>=', $standard['standard-C-down'])->
                 update(['score_to_grade' => 'C']);

             Students::where('grade', $standard['grade'])->
                 where('class', $standard['class'])->
                 where('sum', '<', $standard['standard-B-up'])->
                 where('sum', '>=', $standard['standard-B-down'])->
                 update(['score_to_grade' => 'B']);

             Students::where('grade', $standard['grade'])->
                 where('class', $standard['class'])->
                 where('sum', '>=', $standard['standard-A-up'])->
                 update(['score_to_grade' => 'A']);

        return 'update done!';
    }
}
