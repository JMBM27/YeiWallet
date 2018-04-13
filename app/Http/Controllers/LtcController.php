<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddressLtc;

class LtcController extends AddressController
{
    protected $network='LTCTEST';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* Crear nueva wallet LTC
     *
     */
    public function createWallet(){
        if(!AddressLtc::exists(Auth::user()->id)){
            
            $newAddress=new AddressLtc;
            $wallet = $this->blockio_new_address($newAddress);
        }
        return redirect('/dashboard');
    }
    
    public function send(){
        $add = AddressLtc::getAddress();
        if(!is_null($add)){
            $balance=$this->blockio_balance($add);

            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance->data->balances[0]->available_balance)
                    ->with('moneda','Litecoins')
                    ->with('wallet','ltc');
        }
        return redirect('/dashboard');
    }
           
    /* 
     * Historial de Btc desde la address del usuario logeado  
     */
    public function history(){
        $add = AddressLtc::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
}
