<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offre;

class FrontOffreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $offre = Offre::all();
        return view('front.index', compact('offre'));
    }
}
