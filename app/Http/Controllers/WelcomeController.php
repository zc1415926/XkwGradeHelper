<?php namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.t
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$students = DB::connection('sqlsrv')->select('select * from Students');
		$snameArray = array();

		foreach ($students as $student) {
		//	dd(iconv("GBK", "UTF-8", $student->Sname));
			array_push($snameArray, iconv("GBK", "UTF-8", $student->Sname));
		}

//dd($snameArray);
		return view('welcome', compact('snameArray'));
	}

}
