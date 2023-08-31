<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;

class DataResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('distributor.data-reseller.index', [
            'title' => 'Data Reseller',
            'reseller' => Reseller::where('distributor_id', auth('distributor')->user()->id)->latest()->nama(request(['cari']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reseller  $dataReseller
     * @return \Illuminate\Http\Response
     */
    public function show(Reseller $dataReseller)
    {
        if ($dataReseller->distributor_id !== auth('distributor')->user()->id) {
            abort(403);
        }

        return view('distributor.data-reseller.show', [
            'title' => 'Detail Data Reseller',
            'reseller' => $dataReseller,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reseller  $dataReseller
     * @return \Illuminate\Http\Response
     */
    public function edit(Reseller $dataReseller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reseller  $dataReseller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reseller $dataReseller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reseller  $dataReseller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reseller $dataReseller)
    {
        //
    }
}
