<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
   public function index()
   {
    // dd('het');
    return Inertia::render('Dashboard/Index');
   }
}
