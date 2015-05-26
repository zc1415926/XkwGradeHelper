<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Standard;

use Request;


class ScoreToGradeController extends Controller {

	public function index(){
		return Standard::all();
	}
	public function getStandard(){

		$request = Request::all();

		if(Standard::where('grade', $request['grade'])->
			where('class', $request['class'])->count() != 0)
		{
			Standard::where('grade', $request['grade'])->
			where('class', $request['class'])->update([
				'standard-A-up' => $request['standard-A-up'],
				'standard-B-up' => $request['standard-B-up'],
				'standard-B-down' => $request['standard-B-down'],
				'standard-C-up' => $request['standard-C-up'],
				'standard-C-down' => $request['standard-C-down'],
				'standard-D-down' => $request['standard-D-down']
			]);
		}
		else{
			Standard::create($request);
		}

		$ret = StudentsController::updateScoreToGrade($request);

		$response = array(
			'status' => 'success',
			'msg' => $ret,
		);

		return \Response::json($response);
    }

}
