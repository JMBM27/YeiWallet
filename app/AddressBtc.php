<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class AddressBtc extends Model
{
    protected $table = 'address_btctest';
    public $timestamps = false;
    protected $primaryKey	=	'usuario_id';
    
    //protected $fillable = [
    //    'address','guid','priv_key','label','password','usuario_id',
    //];
    
    protected $fillable = [
        'address','priv_key','label','usuario_id',
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
