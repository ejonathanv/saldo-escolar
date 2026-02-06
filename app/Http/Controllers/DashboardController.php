<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        $tutor = $usuario->tutor;
        return view('dashboard', compact('tutor'));
    }
}
