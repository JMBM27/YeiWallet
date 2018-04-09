<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AddressDoge;

class DogeController extends Controller
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
    
    /* Crear nueva wallet Doge
     *
     */
    public function createWallet(){
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
    
    public function send(){
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
    public function history(){
        $add = AddressDoge::getAddress();
        if(!is_null($add)){
            return 'true';
        }
        return redirect('/dashboard');
    }
}
