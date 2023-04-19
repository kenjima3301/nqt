<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tyre;

class HomeController extends Controller
{
    public function index() {
      $new_products = Tyre::select('*')->take(4)->orderBy("id", "desc")->get();
      $best_products = Tyre::select('*')->take(8)->get();
      return view('client.index', ['new_products'=> $new_products,'best_products' => $best_products] );
    }
    
    public function nqt() {
      return view('client.aboutnqt');
    }
}
