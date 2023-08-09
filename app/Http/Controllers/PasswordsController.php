<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;

class PasswordsController extends Controller
{
    public function retrievePasswords(){return User::find(strval(Auth::user()->id))->accounts;}

    public function searchPasswords($request)
    {
        $validate = $request->validate([
            'search' => ['required', 'string', 'max:255'],
        ]);

        if ($validate) {
            return Accounts::search($request->search)->where('user_id', Auth::user()->id)->get();
        }

        return redirect(RouteServiceProvider::PASSWORDS);
    }

    public function newAccount($request){
        if ($request->delete) {
            User::find(Auth::user()->id)->accounts->where('id', $request->delete)->first->delete();

            return redirect(RouteServiceProvider::PASSWORDS);
        }

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'web' => ['required', 'string', 'url', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'terms' => ['true'],
        ]);

        if ($validate) {
            User::find(Auth::user()->id)->accounts()->updateOrCreate([
                'id' => $request->id,
                'user_id' => Auth::user()->id
            ],[
                'user_id' => Auth::user()->id,
                'web' => $request->web,
                'name' => $request->name,
                'password' => $request->password,
            ]);
        }

        return redirect(RouteServiceProvider::PASSWORDS);
    }
}
