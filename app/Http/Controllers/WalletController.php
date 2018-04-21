<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
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
    public function sendWallet(Request $request){
        $this->validatorSendWallet($request->all())->validate();
        
        if(Auth::user()->pin_status==1 && strcmp(Auth::user()->pin,$request->pin)!=0){
            $request->session()->flash('error','Pin Incorrecto');
            return back();
        }
        
        if(!WalletValidador::validateAddress($request->address)){
            $request->session()->flash('error','Address no valida');
            return back();
        }
        
        if(strcmp($request->tipo,'btc')==0){
            $btc=new BtcController;
            $btc->sending($request->address,$request->cantidad);
        }else if(strcmp($request->tipo,'ltc')==0){
            $btc=new LtcController;
            $btc->sending($request->address,$request->cantidad);
        }else if(strcmp($request->tipo,'doge')==0){
            $btc=new DogeController;
            $btc->sending($request->address,$request->cantidad);
        }
        
        $mensaje='<br><br>Se ha enviado la cantidad de <strong>' 
                  . $request->cantidad . ' ' . $request->tipo . '</strong><br>
                  A la dirección <br><strong>' . $request->address . '</strong>';
    
        $request->session()->flash('titulo','¡Enviado!');
        $request->session()->flash('imagen','Imagenes/confirmar.svg');
        $request->session()->flash('notificacion',$mensaje);
        $request->session()->flash('pie','<h6>Es posible que la transacción tarde algunos minutos en ser procesada</h6>');
        
        return $this->redirectTo();
    }
    
    protected function validatorSendWallet(array $data)
    {
        return Validator::make($data, [
            'address' => 'required',
            'cantidad' => 'required',
        ]);
    }
}
