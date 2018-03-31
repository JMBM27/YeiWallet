<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class AddressBtc extends Model
{
    protected $table = 'address_btc';
    public	$timestamps	=	false;
    protected $primaryKey	=	'usuario_id';
    
    protected $connection = 'default';
    
    public function __construct() {
        parent::__construct();
        $this->connection = Session::get("location");
    }
    
    protected $fillable = [
        'address','guid','tag','password','usuario_id',
    ];
    
    protected $hidden = [
        'guid',
    ];
    
    public static function exists($id){
        $address=Session::get('addressBtc');
        if(is_null($address)){
            $address = AddressBtc::find($id);
            if(!is_null($address)){
                $address=$address->attributes;
                Session::put('addressBtc', $address);
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    
    public static function getAddress(){
        return Session::get('addressBtc');
    }
}
