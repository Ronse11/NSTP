<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function getportal()
    {
        return view('layout.master_layoutportal');
    }
}
