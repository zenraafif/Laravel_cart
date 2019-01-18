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
    	return view('cart/cart');
    }
    public function home(){
    	return view('cart/index');
    }
    public function form(){
    	return view('cart/form');
    }
    public function pembelian(){
    	return view('cart/pembelian');
    }


    // fungsi checkout
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
                    return redirect('cart/pembelian')->with('alert-success', 'Berhasil !');
                }else{
                    return redirect('cart/pembelian')->with('alert', 'Gagal Ditambahkan !');
                }
            } else if (isset($_POST['checkout'])) {
                return view('cart/checkout',$save);
            } else {
                echo "no button ";
            }

        }
    // fungsi checkout
    


    // fungsi tambah pinjaman
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
                return redirect('riwayat')->with('alert-success', 'Berhasil Ditambahkan !');
            }else{
                return redirect('riwayat')->with('alert', 'Gagal Ditambahkan !');
            }
        }
    // fungsi tambah pinjaman
    
    

    //fungsi menapilkan riwayat
        public function riwayat(){ 
            $riwayat = DB::table('master')
            ->join('orders_details', 'master.id', '=', 'orders_details.master_id')
            ->select()
            ->get();
            $master = DB::table('master')
            ->get();
            $arr['master']=$master;
            return view('cart/riwayatPembelian', $arr); 
        }
    //fungsi menapilkan riwayat
    


    //fungsi hapus riwayat
        public function hapusRiwayat($id){
            $deleteMaster = DB::table('master')->where('id',$id)->delete();
            $deleteOrder = DB::table('orders_details')->where('master_id',$id)->delete();

            if ($deleteOrder === FALSE) {
                return redirect('riwayat')->with('alert', 'Gagal Dihapus !');
            }else{
                return redirect('riwayat')->with('alert-success', 'Riwayat berhasil dihapus!');
            }
        }
    //fungsi hapus riwayat
    

    
    // fungsi menampilkan value untuk di edit
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
            return view('cart/ordersDetails', $arr);
        }
    // fungsi menampilkan value untuk di edit



    // fungsi aksi untuk edit dan hapus riwayat otomatis
        public function edit_action(Request $request, $id){
            $count = DB::table('orders_details')->where('master_id', $id)->count();
            if ($count == 0) {
                $deleteOrder = DB::table('master')->where('id',$id)->delete();
                return redirect('riwayat')->with('alert-success', 'Riwayat Dihapus!');;
                exit();
            }else{

                $order_id = request::input('id');
                $part = request::input('part');
                $merk = request::input('merk');
                $serial = request::input('serial');
                $quantity = request::input('quantity');
                $price = request::input('price');
                $subtotal = request::input('subtotal');
                $total = request::input('total');

                $master['total'] = $total;

            for ($i=0; $i<count($part); $i++) {
                $orders_details = DB::table('orders_details')
                        ->where('id',$order_id[$i])
                        ->update([
                            'part' => $part[$i],
                            'merk' => $merk[$i],
                            'no_serial' => $serial[$i],
                            'quantity' => $quantity[$i],
                            'price' => $price[$i],
                            'subtotal' => $subtotal[$i],
                                ]);        
                $upmaster = DB::table('master')
                        ->where('id', $id)
                       ->update($master);

                   }
            }
            return back()->with('alert-success', 'Berhasil Diubah!');
        }
    // fungsi aksi untuk edit dan hapus riwayat otomatis
    


    // fungsi hapus order didalam halaman detail
        public function hapusOrder(Request $request,$id){
            
            $deleteOrder = DB::table('orders_details')->where('id',$id)->delete();
            

            if ($deleteOrder === FALSE) {
                return back()->with('alert', 'Gagal Dihapus !');
            }else{
                return back()->with('alert-success', 'Berhasil Dihapus!');
            }

        } 
    // fungsi hapus order didalam halaman detail
    

}   