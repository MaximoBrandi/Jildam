<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\Accounts;

class ProfileController extends Controller
{
    public function returnProfile(){return User::find(Auth::user()->id)->profile;}

    public function userpfp($request){
        $validate = $request->validate([
            'image' => ['required', 'string', 'url', 'max:255'],
        ]);

        if ($validate) {
            User::find(Auth::user()->id)->profile()->update([
                'pfp' => $request->image,
            ]);
        }
    }

    public function userdata($request)
    {
        $validate = $request->validate([
            'username' => ['nullable','string', 'max:255'],
            'name' => ['nullable','string', 'max:255'],
            'surname' => ['nullable','string', 'max:255'],
            'biography' => ['nullable','string', 'max:255'],
        ]);

        if ($validate) {
            if ($request->has('username')) {
                User::find(Auth::user()->id)->update([
                    'username' => $request->username,
                ]);
            }
            if ($request->has('name')) {
                User::find(Auth::user()->id)->profile()->update([
                    'name' => $request->name,
                ]);
            }
            if ($request->has('surname')) {
                User::find(Auth::user()->id)->profile()->update([
                    'surname' => $request->surname,
                ]);
            }
            if ($request->has('biography')) {
                User::find(Auth::user()->id)->profile()->update([
                    'biography' => $request->biography,
                ]);
            }
        }
    }

    public function profile($request){
        if ($request->has('image')) {
            $this->userpfp($request);
        }

        if ($request->has(['name', 'username', 'surname', 'biography'])) {
            $this->userdata($request);
        }

    }

    public function passwordreset($request)
    {
        $valid = $request->validate([
            'email' => ['required', 'email'],
            'lastpassword' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($valid) {
            Auth::user()->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();
        }
    }

    public function deleteaccount($request)
    {
        $valid = $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        if ($valid) {
            Accounts::where('user_id', Auth::user()->id)->delete();

            Profile::where('user_id', Auth::user()->id)->delete();

            User::find(Auth::user()->id)->delete();

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        }

        return redirect('/');
    }

    public function resetpasswords($request)
    {
        $valid = $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        if ($valid) {
            Accounts::where('user_id', Auth::user()->id)->delete();
        }

        return redirect('/');
    }
}
