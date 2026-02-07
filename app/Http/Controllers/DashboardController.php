<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        $role = $usuario->role;

        if($role == 'tutor'){
            $tutor = $usuario->tutor;
            return view('dashboard.tutor', compact('usuario', 'tutor'));
        }

        if($role == 'admin'){
            return view('dashboard.admin', compact('usuario'));
        }
    }
}
