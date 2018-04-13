<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddressBtc;

class BtcController extends AddressController
{
    protected $network='BTCTEST';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* Crear nueva wallet BTC
     *
     */
    public function createWallet(){
        if(!AddressBtc::exists(Auth::user()->id)){
            if(strcmp($this->network,'BTC')==0){
                $newAddress=new AddressBtc;
                $wallet = $this->blockchain_new_address($newAddress);
            }else{
                $newAddress=new AddressBtc;
                $wallet = $this->blockio_new_address($newAddress);
            }
        }
        return redirect('/dashboard');
    }
 
    /* 
     * Enviar Btc desde la address del usuario logeado  
     */
    public function send(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            $balance='';
            if(strcmp($this->network,'BTC')==0){
                $balance=$this->blockchain_balance($add);
            }else {
                $balance=$this->blockio_balance($add);
            }
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance)
                    ->with('moneda','Bitcoins')
                    ->with('wallet','btc');
        }
        return redirect('/dashboard');
    }
    
    public function sending($address,$monto){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            $balance='';
            if(strcmp($this->network,'BTC')==0){
                //$result=$this->blockchain_balance($add);
            }else {
                $result=$this->blockio_send($add,$address,$monto);
                var_dump($result);
            }
            
            return "enviado";
        }
        //return redirect('/dashboard');
    }
           
    /* 
     * Historial de Btc desde la address del usuario logeado  
     */
    public function history(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
}
