<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BtcController;
use App\Http\Controllers\LtcController;
use App\Http\Controllers\DogeController;
use App\AddressBtc;
use App\AddressLtc;
use App\AddressDoge;
use App\TransactionBtc;
use App\TransactionLtc;
use App\TransactionDoge;

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
                return redirect('/dashboard/btc/history/');
            }
        }else if(strcmp($add,'ltc')==0){
            if(strcmp($op,'send')==0){
                return redirect('/dashboard/ltc/send');
            }else{
                return redirect('/dashboard/ltc/history/');
            }
        }else if(strcmp($add,'doge')==0){
            if(strcmp($op,'send')==0){
                return redirect('/dashboard/doge/send/');
            }else{
                return redirect('/dashboard/doge/history/');
            }
        }
        return $this->redirectTo();
    }
    
    /* Mostrar Select Wallet
     *
     */
    public function showSelectWalletSend(){
        $isAddressBtc = AddressBtc::exists(Auth::user()->id);
        $isAddressLtc = AddressLtc::exists(Auth::user()->id);
        $isAddressDoge= AddressDoge::exists(Auth::user()->id);
        if($isAddressBtc || $isAddressLtc || $isAddressDoge){
            return view( 'select_wallet')->with('opcion','send');
        }
        return $this->redirectTo();
    }
    public function showSelectWalletHistory(){
        $isAddressBtc = AddressBtc::exists(Auth::user()->id);
        $isAddressLtc = AddressLtc::exists(Auth::user()->id);
        $isAddressDoge= AddressDoge::exists(Auth::user()->id);
        if($isAddressBtc || $isAddressLtc || $isAddressDoge){
            return view( 'select_wallet')->with('opcion','history');
        }
        return $this->redirectTo();
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
            $btc->sending($request);
        }else if(strcmp($request->tipo,'ltc')==0){
            $btc=new LtcController;
            $btc->sending($request);
        }else if(strcmp($request->tipo,'doge')==0){
            $btc=new DogeController;
            $btc->sending($request);
        }
        
        return $this->redirectTo();
    }
    
    /* history Wallet
     *
     */
    public function historyWallet(Request $request){
        if(strcmp($request->tipo,'btc')==0){
            return redirect('/dashboard/btc/history')
                ->with('action',$request->action)
                ->with('page',$request->page);
        }else if(strcmp($request->tipo,'ltc')==0){
           return redirect('/dashboard/ltc/history')
                ->with('action',$request->action)
                ->with('page',$request->page);
        }else if(strcmp($request->tipo,'doge')==0){
            return redirect('/dashboard/doge/history')
                ->with('action',$request->action)
                ->with('page',$request->page);
        }
        
        return $request->tipo;
    }
    
    protected function validatorSendWallet(array $data)
    {
        return Validator::make($data, [
            'address' => 'required',
            'cantidad' => 'required',
        ]);
    }
    
    public static function ultimasTransaction($i){
        if($i==1){
             $tx1=TransactionBtc::getTransaction1(6,Auth::user()->id);
            return $tx1;
        }
        if($i==2){
             $tx2=TransactionLtc::getTransaction1(6,Auth::user()->id);
            return $tx2;
        }
        if($i==3){
             $tx3=TransactionDoge::getTransaction1(6,Auth::user()->id);
            return $tx3;
        }
    }
        
}
