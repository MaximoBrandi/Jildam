<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordsController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function main(){
        return view('main');
    }

    public function profile(){
        return view('profile', ['data' => (new ProfileController)->returnProfile()]);
    }

    public function passwords(){
        return view('passwords', ['Passwords' => (new PasswordsController)->retrievePasswords()]);
    }

    public function insert(Request $request){
        (new PasswordsController)->newAccount($request);

        return view('passwords', ['Passwords' => (new PasswordsController)->retrievePasswords()]);
    }
}
