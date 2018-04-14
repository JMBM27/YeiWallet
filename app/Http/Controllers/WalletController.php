<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\BtcController;

class WalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    public function redirectTo(){
        return redirect('/dashboard');
    }
    
    /* Select Wallet
     *
     */
    public function selectWallet(){
        
        $add = Input::get('wallet');
        $op = Input::get('opcion');
        if(strcmp($add,'btc')==0){
            if(strcmp($op,'send')==0){
                return redirect('/dashboard/btc/send');
            }else{
                return redirect('/dashboard/btc/history');
            }
        }else if(strcmp($add,'ltc')==0){
            if(strcmp($op,'send')==0){
                return redirect('/dashboard/ltc/send');
            }else{
                return redirect('/dashboard/ltc/history');
            }
        }else if(strcmp($add,'doge')==0){
            if(strcmp($op,'send')==0){
                return redirect('/dashboard/doge/send');
            }else{
                return redirect('/dashboard/doge/history');
            }
        }
        return $this->redirectTo();
    }
    
    /* Mostrar Select Wallet
     *
     */
    public function showSelectWalletSend(){
        return view( 'select_wallet')->with('opcion','send');
    }
    public function showSelectWalletHistory(){
        return view( 'select_wallet')->with('opcion','history');
    }
    
    /* send Wallet
     *
     */
    public function sendWallet(){
        
        $add = Input::get('wallet');
        $monto = Input::get('monto');
        $address = Input::get('address');
        if(strcmp($add,'btc')==0){
            $btc=new BtcController;
            $btc->sending($address,$monto);
        }else if(strcmp($add,'ltc')==0){
           
        }else if(strcmp($add,'doge')==0){
            
        }
       // return $this->redirectTo();
    }
}
