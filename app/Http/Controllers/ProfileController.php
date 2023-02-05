<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function returnProfile(){return User::find(Auth::user()->id)->profile;}
}
