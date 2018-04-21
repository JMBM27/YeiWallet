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
    public function createWallet(Request $request){
        if(!AddressLtc::exists(Auth::user()->id)){
            
            //$newAddress=new AddressLtc;
            //$wallet = $this->blockio_new_address($newAddress);
            $mensaje='<br><br>¡Felicidades! <strong>'.Auth::user()->usuario.'</strong><br>
                  Tu dirección es<br><strong> 34wd5wda6sd4as56d78asd6ad4a6yda </strong>';
        
            $request->session()->flash('titulo','Address Creada');
            $request->session()->flash('imagen','Imagenes/litelogo.svg');
            $request->session()->flash('notificacion',$mensaje);
            $request->session()->flash('pie','<h6>Ahora puedes gestionar tus direcciones</h6>');
        }
        return redirect('/dashboard');
    }
    
    public function send(){
        $add = AddressLtc::getAddress();
        if(!is_null($add)){
            $balance='0.2';
            $fee='0.0000261';
            /*
            $balance=$this->blockio_balance($add);
            $fee=$this->blockio_fee($add,$balance);
            */
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance)
                    ->with('comision',$fee)
                    ->with('moneda','Litecoins')
                    ->with('tipo','ltc');
        }
        return redirect('/dashboard');
    }
    
    public function sending($address,$monto){
        $add = AddressLtc::getAddress();
        if(!is_null($add)){
            //$result=$this->blockio_send($add,$address,$monto);
        }
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
