<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller
{
    public function index(){
        if (isset(Auth::user()->id)) {
            return view('main');
        }
        else{
            return view('index');
        }
    }
}
