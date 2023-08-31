<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class LoginResellerController extends Controller
{
    public function index()
    {
        return view('reseller.home', [
            'title' => 'Halaman Utama',
            'admin' => Admin::where('id', 1)->get('noTelp'),
            'reseller' => Reseller::latest()->get(),
            'produk' => Product::whereBetween('id', [1, 3])->get(),
        ]);
    }

    public function login()
    {
        return view('reseller.login.index');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::guard('reseller')->attempt($request->only('email', 'password'))) {
            if (Auth::guard('reseller')->check()) {
                Cart::instance('cart')->restore(Auth::guard('reseller')->user()->email);
            }

            return redirect()->route('reseller.home');
        }
        return redirect()->route('reseller.login.index')->with('loginGagal', 'Login gagal, silahkan coba lagi!');
    }

    public function logout()
    {
        if (Cart::instance('cart')->count(false) == 0) {
        } else {
            Cart::instance('cart')->store(Auth::guard('reseller')->user()->email);
        }
        Auth::guard('reseller')->logout();
        Cart::destroy();
        return redirect()->route('reseller.home');
    }
}
