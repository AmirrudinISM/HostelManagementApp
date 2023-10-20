<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    function index(Request $request){
        return view('admins.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', '=', $data['email'])->first();
        
        if ($admin) {
            if ($data['password'] == $admin->password) {
                $request->session()->put('email', $admin->email);
                return redirect('/admin/admin_dashboard');
            } else {
                return back()->with('error', 'Password mismatch');
            }
        } else {
            return back()->with('error', 'This email is not registered');
        }
    }

    public function dashboard(Request $request)
    {
        return view('admins.admin_dashboard');
    }
}
