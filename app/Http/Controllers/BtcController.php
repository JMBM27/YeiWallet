<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddressBtc;

class BtcController extends Controller
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
    
    /* Crear nueva wallet BTC
     *
     */
    public function createWallet(){
        if(!AddressBtc::exists(Auth::user()->id)){
            $api_code = env('API_BTC', null);

            $Blockchain = new \Blockchain\Blockchain($api_code);
            $Blockchain->setServiceUrl('http://localhost:3000/');

            $ps='weakPassword01!';
            
            $wallet = $Blockchain->Create->create($ps);
        
        
            $newAddress=new AddressBtc;
        
            $newAddress->address=$wallet->address;
            $newAddress->guid=$wallet->guid;
            if(is_null($wallet->label)){
                $newAddress->label='';
            }else{
                $newAddress->label=$wallet->label;   
            }
            $newAddress->password=$ps;
            $newAddress->usuario_id=Auth::user()->id;
        
            $newAddress->save();
        }
        return redirect('/dashboard');
    }
 
    /* 
     * Enviar Btc desde la address del usuario logeado  
     */
    public function send(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            $api_code = env('API_BTC', null);
            $Blockchain = new \Blockchain\Blockchain($api_code);
            $Blockchain->setServiceUrl('http://localhost:3000/');
            $Blockchain->Wallet->credentials($add['guid'], $add['password']);

            $balance=$Blockchain->Wallet->getBalance();
            
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance)
                    ->with('moneda','Bitcoins');
        }
        return redirect('/dashboard');
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
