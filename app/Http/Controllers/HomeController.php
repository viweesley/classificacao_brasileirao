<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class HomeController extends Controller
{
    public function index(){
        $clubes = Clube::orderBy('nome', 'asc')->get();
        return view('index')->with(['clubes' => $clubes]);
    }
}
