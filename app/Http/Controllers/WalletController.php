<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\AddressBtc;
use App\AddressLtc;
use App\AddressDoge;

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
    
    /* Crear nueva wallet BTC
     *
     */
    public function createWalletBtc(){
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
                $newAddress->tag='';
            }else{
                $newAddress->tag=$wallet->label;   
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
    public function sendBtc(){
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
    public function historyBtc(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
    
    /* Crear nueva wallet LTC
     *
     */
    public function createWalletLtc(){
        if(!AddressLtc::exists(Auth::user()->id)){
            $api_code = env('API_LTC', null);
            $pin = env('PIN', null);
            $version=2;

            $block_io = new \BlockIo\BlockIo($api_code, $pin, $version);
            
            $label='YeiWallet-'.Auth::user()->id;
            
            $wallet = $block_io->get_new_address(array('label' => $label));
        
            $newAddress=new AddressLtc;
        
            $newAddress->id=$wallet->data->user_id;
            $newAddress->address=$wallet->data->address;
            $newAddress->label=$wallet->data->label;
            $newAddress->usuario_id=Auth::user()->id;
        
            $newAddress->save();
        }
        return redirect('/dashboard');
    }
    
    public function sendLtc(){
        $add = AddressLtc::getAddress();
        if(!is_null($add)){
            $api_code = env('API_LTC', null);
            $pin = env('PIN', null);
            $version=2;

            $block_io = new \BlockIo\BlockIo($api_code, $pin, $version);

            $balance=$block_io->get_address_balance(array('labels' => $add['label']));

            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance->data->balances[0]->available_balance)
                    ->with('moneda','Litecoins');
        }
        return redirect('/dashboard');
    }
           
    /* 
     * Historial de Btc desde la address del usuario logeado  
     */
    public function historyLtc(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
    
    /* Crear nueva wallet Doge
     *
     */
    public function createWalletDoge(){
        if(!AddressDoge::exists(Auth::user()->id)){
            $api_code = env('API_DOGE', null);
            $pin = env('PIN', null);
            $version=2;

            $block_io = new \BlockIo\BlockIo($api_code, $pin, $version);
            
            $label='YeiWallet-' . Auth::user()->id;
            
            $wallet = $block_io->get_new_address(array('label' => $label));
        
            $newAddress=new AddressDoge;
        
            $newAddress->id=$wallet->data->user_id;
            $newAddress->address=$wallet->data->address;
            $newAddress->label=$wallet->data->label;
            $newAddress->usuario_id=Auth::user()->id;
        
            $newAddress->save();
        }
        return redirect('/dashboard');
    }
    
    public function sendDoge(){
        $add = AddressDoge::getAddress();
        if(!is_null($add)){
            $api_code = env('API_DOGE', null);
            $pin = env('PIN', null);
            $version=2;

            $block_io = new \BlockIo\BlockIo($api_code, $pin, $version);

            $balance=$block_io->get_address_balance(array('labels' => $add['label']));
            
            return view('send_money')
                    ->with('address',$add['address'])
                    ->with('balance',$balance->data->balances[0]->available_balance)
                    ->with('moneda','Dogecoins');
        }
        return redirect('/dashboard');
    }
           
    /* 
     * Historial de Btc desde la address del usuario logeado  
     */
    public function historyDoge(){
        $add = AddressBtc::getAddress();
        if(!is_null($add)){
            return 'true';
        }
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
        return $add . "  ". $op;
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
}
