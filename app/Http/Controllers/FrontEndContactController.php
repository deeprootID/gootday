<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndContactController extends Controller
{
    public function getMaster(){
      return view('frontEnd.contact.index');
    }
}
