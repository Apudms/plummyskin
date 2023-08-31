<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    public function download(Request $request, $kit)
    {
        return response()->download(public_path('storage/' . $kit));
    }
}
