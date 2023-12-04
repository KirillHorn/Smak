<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModerController extends Controller
{
    public function  serviceRedact_blade() {
        return view('moder.serviceRedact');
    }
    public function  serviceEdit_blade() {
        return view('moder.serviceEdit');
    }
}
