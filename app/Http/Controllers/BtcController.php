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
    public function createWallet(Request $request){
        if(!AddressBtc::exists(Auth::user()->id)){
            /*if(strcmp($this->network,'BTC')==0){
                $newAddress=new AddressBtc;
                $wallet = $this->blockchain_new_address($newAddress);
            }else{
                $newAddress=new AddressBtc;
                $wallet = $this->blockio_new_address($newAddress);
            }*/
        }
        
        $mensaje='<br><br>¡Felicidades! <strong>'.Auth::user()->usuario.'</strong><br>
                  Tu dirección es<br><strong> 34wd5wda6sd4as56d78asd6ad4a6yda </strong>';
        
        $request->session()->flash('titulo','Address Creada');
        $request->session()->flash('imagen','Imagenes/bitlogo.svg');
        $request->session()->flash('notificacion',$mensaje);
        $request->session()->flash('pie','<h6>Ahora puedes gestionar tus direcciones</h6>');
        
        return redirect('/dashboard');
    }
 
    /* 
     * Enviar Btc desde la address del usuario logeado  
     */
    public function send(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            $balance='0.2';
            $fee='0.0000261';
            /*if(strcmp($this->network,'BTC')==0){
                $balance=$this->blockchain_balance($add);
            }else {
                $balance=$this->blockio_balance($add);
                $fee=$this->blockio_fee($add,$balance);
            }*/
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance)
                    ->with('comision',$fee)
                    ->with('moneda','Bitcoins')
                    ->with('tipo','btc');
        }
        return redirect('/dashboard');
    }
    
    public function sending($address,$monto){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            if(strcmp($this->network,'BTC')==0){
                //$result=$this->blockchain_balance($add);
            }else {
                //$result=$this->blockio_send($add,$address,$monto);
            }
        }
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
