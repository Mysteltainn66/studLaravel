<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();

        if ($user){
            session()->put('impersonate', $user->id);
        }

        if(Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to enter yourself');
        }

        if ($user->is_admin == 1){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed enter to admin account');
        }

        return redirect('home');
    }

    public function destroy()
    {
        session()->forget('impersonate');

        return redirect()->route('admin.users.index')->with('success', 'Welcome back.');
    }
}
