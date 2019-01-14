<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Session;
use File;
use Illuminate\Support\Facades\Input;

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
    public function pembelian(){
    	return view('pembelian');
    }
    public function checkout(Request $request){
        $request->flash();
        $request->flashOnly('username', 'email');
    }
    public function TambahPinjamanAction(){

            $part = Request::input('part');
            $merk = Request::input('merk');
            $serial = Request::input('serial');   
            $quantity = Request::input('quantity');
            $price = Request::input('price');
            $subtotal = Request::input('subtotal');
            $total = Request::input('total');
            $master_id  = DB::table('master')->select('id')->latest()->first()->id+1;
            $id_pembayaran = uniqid(10);


            $save['part'] = $part;
            $save['merk'] = $merk;
            $save['serial'] = $serial;
            $save['quantity'] = $quantity;
            $save['price'] = $price;
            $save['subtotal'] = $subtotal;
            $master['payment_id'] = $id_pembayaran;
            $master['total'] = $total;
            // $save['date'] = date('Y-m-d H:i:s');
            $actions = DB::table('master')->insert($master);

            for($i=0; $i<count($part); $i++)
              {
                $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
              } 
            if ($action === TRUE) {
                return redirect('shopping')->with('message', 'Berhasil !');
            }else{
                echo "string";
            }
        }

}

