<?php namespace App\Http\Controllers;

use App\ClassGrade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClassGradeController extends Controller {

	public function index(){
        $xlwClassGrades = DB::connection('sqlsrv')
            ->select('select Sgrade, Sclass from Students group by Sgrade, Sclass ORDER BY Sgrade,Sclass ASC');

        $localClassGrades =DB::connection()->select('select grade, class from class_grades ORDER BY grade, class ASC');

        return view('classgrade.sync', compact('xlwClassGrades', 'localClassGrades'));
    }

    public function sync(){
        DB::statement('truncate table class_grades');

        $xlwClassGrades = DB::connection('sqlsrv')
            ->select('select Sgrade, Sclass from Students group by Sgrade, Sclass ORDER BY Sgrade,Sclass ASC');

        foreach($xlwClassGrades as $xlwCG){
            $cg = new ClassGrade();
            $cg->grade = $xlwCG->Sgrade;
            $cg->class = $xlwCG->Sclass;
            $cg->save();
        }

        Session::flash('flash_message', '已经成功同步数据！');

        return redirect('classgrade');
    }

    public static function getGrades(){
        $xlwGrades = DB::connection('sqlsrv')
            ->select('select Sgrade from Students group by Sgrade ORDER BY Sgrade ASC');

        $grades = array();
        foreach ($xlwGrades as $xkwGrade) {
            array_push($grades, $xkwGrade->Sgrade);
        }

        return $grades;
    }

    public static function getGradesWithTitle(){
        $xlwGrades = DB::connection('sqlsrv')
            ->select('select Sgrade from Students group by Sgrade ORDER BY Sgrade ASC');

        $grades = ["请选择"];
        foreach ($xlwGrades as $xkwGrade) {
            array_push($grades, $xkwGrade->Sgrade);
        }

        return $grades;
    }

    public static function getClasses($grade){
        $xkwClasses = DB::connection('sqlsrv')
            ->select('select Sclass from Students where Sgrade=' . $grade . ' group by Sclass ORDER BY Sclass ASC');

        $classes = array();
        foreach ($xkwClasses as $xkwClass) {
            array_push($classes, $xkwClass->Sclass);
        }


        return $classes;
    }

    public static function getClassesWithTitle($grade){
        $xkwClasses = DB::connection('sqlsrv')
            ->select('select Sclass from Students where Sgrade=' . $grade . ' group by Sclass ORDER BY Sclass ASC');

        $classes = ["请选择"];
        foreach ($xkwClasses as $xkwClass) {
            array_push($classes, $xkwClass->Sclass);
        }


        return $classes;
    }

}
