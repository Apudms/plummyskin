<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\MarketingKit;
use App\Models\Reseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('administrator.index', [
            'title' => 'Dashboard',
            'distributor' => Distributor::all(),
            'reseller' => Reseller::all(),
            'markit' => MarketingKit::all(),
        ]);
    }

    public function login()
    {
        return view('administrator.login.index');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.index');
        }
        return back()->with('loginGagal', 'Login gagal, silahkan coba lagi!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
