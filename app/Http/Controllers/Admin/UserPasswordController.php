<?php

namespace App\Http\Controllers\Admin;

use App\Rules\MatchesUserPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPasswordController extends Controller
{
    public function update()
    {
        request()->validate([
            'current_password' => new MatchesUserPassword(),
            'password' => ['min:6', 'required', 'confirmed']
        ]);

        auth()->user()->update(['password' => bcrypt(request('password'))]);
    }
}
