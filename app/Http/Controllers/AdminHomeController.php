<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function getMaster(){
      return view('backEnd.dashboard.index');
    }

    public function getLogin(){
      return view('admin.login.index');
    }
}
