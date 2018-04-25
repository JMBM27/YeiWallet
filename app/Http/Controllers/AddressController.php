<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class AddressController extends Controller
{
    protected $network='BTC';
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    private function strToHex($string){
        $hex='';
        for ($i=0; $i < strlen($string); $i++)
        {
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }
    
    /*
     * metodos para la 
     * api blockchain.info
     */
    
    protected function blockchain(){
        $api_code=env('API_' . $this->network,null);
        $Blockchain = new \Blockchain\Blockchain($api_code);
        $Blockchain->setServiceUrl('http://localhost:3000/');
        return $Blockchain;
    }
    
    protected function blockchain_new_address(Model $modelo){
        $Blockchain = $this->blockchain();
        
        $ps='weakPassword01!';
        $block_io = new \BlockIo\BlockIo(null, null, 2);
        $key=$block_io->initKey()->fromPassphrase($this->strToHex(str_random(70)))->toWif($this->network);
        $label= Auth::user()->usuario. '-' . Auth::user()->id;
        
        $wallet = $Blockchain->Create->createWithKey($ps, $key,$email=null,$label);
        
        $modelo->address=$wallet->address;
        $modelo->guid=$wallet->guid;
        $modelo->label=$wallet->label;   
        $modelo->password=$ps;
        $modelo->usuario_id=Auth::user()->id;
        $modelo->save();
    }
    
    protected function blockchain_balance($add){
        $Blockchain = $this->blockchain();
        $Blockchain->Wallet->credentials($add['guid'], $add['password']);
        $balance=$Blockchain->Wallet->getBalance();
        return $balance;
    }
    
    /*
     * metodos para la 
     * api block.io
     */
 
    protected function blockio(){
        $api_code=env('API_' . $this->network,null);
        $pin=env('PIN',null);
        $block_io = new \BlockIo\BlockIo($api_code, $pin, 2);
        return $block_io;
    }
    
    protected function blockio_new_address(Model $modelo){
        $block_io = $this->blockio();    
        $label= Auth::user()->usuario. '-' . Auth::user()->id;    
        $wallet = $block_io->get_new_address(array('label' => $label));
        
        $modelo->address=$wallet->data->address;
        $modelo->label=$wallet->data->label;
        $modelo->usuario_id=Auth::user()->id;
        $modelo->save();
        return $modelo;
    }
    
    protected function blockio_balance($add){
        $block_io = $this->blockio();
        $balance=$block_io->get_address_balance(array('labels' => $add['label']));
        return $balance->data->balances[0]->available_balance;
    }
    
    protected function blockio_send($wallet,$address,$monto){
        $block_io = $this->blockio();
        return $block_io->withdraw_from_labels(array('amounts' => $monto,'from_labels' => $wallet['label'],'to_addresses' => $address,'pin' => env('PIN',null)));
    }
    
    protected function blockio_fee($wallet,$balance){
        $block_io = $this->blockio();
        $fee = $block_io->get_network_fee_estimate(array('amounts' => $balance, 'to_addresses' => $wallet['address']));
        return $fee->data->estimated_network_fee;
    }
    
    protected function blockio_get_transactions($tipo,$wallet){
        $block_io = $this->blockio();
        return $block_io->get_transactions(array('type' => $tipo, 'addresses' => $wallet['address']));
    }
}
