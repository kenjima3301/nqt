<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
  public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:STAFF');
    }
    
  public function dashboard() {
    
    return view('staff.dashboard');
  }
}
