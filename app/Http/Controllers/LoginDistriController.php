<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Reseller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginDistriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghasilan = DB::table('orders')
            ->leftJoin('resellers', function ($join) {
                $join->on('resellers.id', '=', 'orders.reseller_id');
            })
            ->selectRaw('SUM(orders.subtotal) as hasil')
            ->where('resellers.distributor_id', auth('distributor')->user()->id)
            ->where('status', 'Diterima')
            ->get();

        return view('distributor.index', [
            'title' => 'Dashboard',
            'reseller' => Reseller::where('distributor_id', auth('distributor')->user()->id)->get(),
            'produks' => Product::where('distributor_id', auth('distributor')->user()->id)->get(),
            'penghasilan' => $penghasilan,
            'pesanan' => Reseller::with('order')->where('distributor_id', auth('distributor')->user()->id)->first(),
        ]);
    }

    public function login()
    {
        return view('distributor.login.index');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::guard('distributor')->attempt($request->only('email', 'password'))) {
            return redirect()->route('distributor.index');
        }
        return redirect()->route('distributor.login')->with('loginGagal', 'Login gagal, silahkan coba lagi!');
    }

    public function logout()
    {
        Auth::guard('distributor')->logout();
        return redirect()->route('distributor.login');
    }
}
