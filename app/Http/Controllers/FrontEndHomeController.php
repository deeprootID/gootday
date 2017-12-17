<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndHomeController extends Controller
{
    public function getMaster(){
      return view('frontEnd.master');
    }
}
