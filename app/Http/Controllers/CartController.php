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


        if (isset($_POST['simpan'])) {
            $actions = DB::table('master')->insert($master);
            for($i=0; $i<count($part); $i++)
              {
                $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
              } 
            if ($action === TRUE) {
                return redirect('pembelian')->with('alert-success', 'Berhasil !');
            }else{
                return redirect('pembelian')->with('alert', 'Gagal Ditambahkan !');
            }
        } else if (isset($_POST['checkout'])) {
            return view('checkout',$save);
        } else {
            echo "no button ";
        }

        // if ( isset($_POST['simpan']) ) {
        //     $actions = DB::table('master')->insert($master);
        //     for($i=0; $i<count($part); $i++)
        //       {
        //         $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
        //       } 
        //     if ($action === TRUE) {
        //         return redirect('pembelian')->with('alert-success', 'Berhasil !');
        //     }else{
        //         return redirect('pembelian')->with('alert', 'Gagal Ditambahkan !');
        //     }
        // }else{
        //     dd($save);
        // }
    }
    public function TambahPinjamanAction(Request $request){

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
            
            $actions = DB::table('master')->insert($master);
            for($i=0; $i<count($part); $i++)
              {
                $action = DB::table('orders_details')->insert(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
              } 
            if ($action === TRUE) {
                return redirect('pembelian')->with('alert-success', 'Berhasil !');
            }else{
                return redirect('pembelian')->with('alert', 'Gagal Ditambahkan !');
            }
        }
        public function riwayat(){ 
            $riwayat = DB::table('master')
                        ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
                        ->select()
                        ->get();
            $master = DB::table('master')
                        ->get();
            $arr['master']=$master;
            return view('riwayatPembelian', $arr); 
        }
        public function hapusRiwayat($id){
            $deleteMaster = DB::table('master')->where('id',$id)->delete();
            $deleteOrder = DB::table('orders_details')->where('master_id',$id)->delete();

            return redirect('riwayat')->with('message','Data berhasil dihapus!');
        }
        public function getEdit($id){
            $orders_details = DB::table('master')
                        ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
                        ->select()
                        ->where('master_id',$id)
                        ->get();
            $master = DB::table('master')
                        ->where('id',$id)
                        ->get();
            $arr['master'] = $master;
            $arr['orders_details'] = $orders_details;
            return view('ordersDetails', $arr);
        }
        public function getEditAction(request $request, $id){
            $orders_details = DB::table('master')
                        ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
                        ->select()
                        ->where('master_id',$id)
                        ->get();

            $part = Request::input('part');
            $merk = Request::input('merk');
            $serial = Request::input('serial');   
            $quantity = Request::input('quantity');
            $price = Request::input('price');
            $subtotal = Request::input('subtotal');
            $total = Request::input('total');
            $master_id  = DB::table('master')->select('id')->latest()->first()->id+1;
            
            $save['part'] = $part;
            $save['merk'] = $merk;
            $save['no_serial'] = $serial;
            $save['quantity'] = $quantity;
            $save['price'] = $price;
            $save['subtotal'] = $subtotal;
            $master['total'] = $total;

            $arr['orders'] = $orders_details;
            $hasil = DB::table('master')->where('id', $id)
            ->update($save);

            $arr['master'] = $users;//jadikan array

            return redirect('perpustakaan/user'); //return view + kirimkan data tabel[array];

            // $actions = DB::table('master')->where('id', $id)->update($master);
            
            
            // for($i=0; $i<count($part); $i++)
            //   {
            //     $action = DB::table('orders_details')->update(array('master_id' => $master_id, 'part' => $part[$i], 'merk' => $merk[$i], 'no_serial' => $serial[$i], 'quantity' => $quantity[$i], 'price' => $price[$i], 'subtotal' => $subtotal[$i] ));
            //     dd($action);
            //   } 
            // if ($action === TRUE) {
            //     return redirect('pembelian')->with('alert-success', 'Berhasil !');
            // }else{
            //     return redirect('pembelian')->with('alert', 'Gagal Ditambahkan !');
            // }
         
        }

}

