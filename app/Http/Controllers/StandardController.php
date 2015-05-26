<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Standard;
class StandardController extends Controller {

	public function index(){


        return  Standard::all();
    }

    public function getStandardByGradeClass($grade, $class){
        $standard = Standard::where('grade', $grade)->
            where('class', $class)->get();

        if($standard->count() == 0){
            return "";
        }else{
            return $standard;
        }
    }
}
