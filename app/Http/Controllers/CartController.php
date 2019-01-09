<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
    	return view('cart');
    }
    public function home(){
    	return view('index');
    }
    public function form(){
    	return view('form');
    }
}
