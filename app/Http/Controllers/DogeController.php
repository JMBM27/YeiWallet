<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddressDoge;

class DogeController extends AddressController
{
    protected $network='DOGETEST';   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /* Crear nueva wallet Doge
     *
     */
    public function createWallet(){
        if(!AddressDoge::exists(Auth::user()->id)){

            $newAddress=new AddressDoge;
            $wallet = $this->blockio_new_address($newAddress);
            
        }
        return redirect('/dashboard');
    }
    
    public function send(){
        $add = AddressDoge::getAddress();
        if(!is_null($add)){
            
            $balance=$this->blockio_balance($add);
            
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance->data->balances[0]->available_balance)
                    ->with('moneda','Dogecoins')
                    ->with('wallet','doge');
        }
        return redirect('/dashboard');
    }
           
    /* 
     * Historial de Btc desde la address del usuario logeado  
     */
    public function history(){
        $add = AddressDoge::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
}
