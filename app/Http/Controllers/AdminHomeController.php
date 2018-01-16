<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Charts;
use App\Order;

class AdminHomeController extends Controller
{
	public function getMaster(){
        $chart = Charts::database(Order::all(), 'line', 'highcharts')
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupByDay();
        
        //return view('chart', ['chart' => $chart]);
		return view('backEnd.dashboard.index', ['chart' => $chart]);
	}
	
	public function getSignIn(){
		return view('admin.login.index');
	}
	
	public function postSignIn(Request $request) {
		$this->validate($request, [
			'email' => 'email|required',
			'password' => 'required|min:4'
		]);
		
		if (Auth::attempt([
			'email' => $request->input('email'),
			'password' => $request->input('password')
		])) {
			return redirect()->route('admin.home');
		} else {
			return 'login gagal!';
		}
	}

	public function getLogout(){
        Auth::logout();
        return redirect()->route('frontEnd.home');
    }
}
