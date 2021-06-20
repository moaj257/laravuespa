<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecretController extends Controller
{
    public function index(Request $request) {
        dd(Auth::user());
        dd($request->all());
        // return $request->user()->secrets;
    }
}
