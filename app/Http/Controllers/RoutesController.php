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
        return view('profile', ['data' => (new ProfileController)->returnProfile(), 'username' => User::find(Auth::user()->id)->username ]);
    }

    public function passwords(){
        return view('passwords', ['Passwords' => (new PasswordsController)->retrievePasswords()]);
    }

    public function insert(Request $request){
        (new PasswordsController)->newAccount($request);

        return $this->passwords();
    }

    public function search(Request $request){

        return view('passwords', ['Passwords' => (new PasswordsController)->searchPasswords($request), 'search' => $request->search]);
    }

    public function update(Request $request){
        (new ProfileController)->profile($request);

        return $this->profile();
    }

    public function passwordreset(Request $request){
        (new ProfileController)->passwordreset($request);

        return $this->profile();
    }

    public function resetpasswords(Request $request)
    {
        return (new ProfileController)->resetpasswords($request);

        return $this->profile();
    }

    public function deleteaccount(Request $request)
    {
        return (new ProfileController)->deleteaccount($request);

        return $this->profile();
    }
}
