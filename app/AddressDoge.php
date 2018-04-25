<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
class AddressDoge extends Model
{
    protected $table = 'address_doge';
    public $timestamps = false;
    protected $primaryKey	=	'usuario_id';
    
    protected $fillable = [
        'address','priv_key','label','usuario_id',
    ];
    
    public static function exists($id){
        $address=Session::get('addressDoge');
        if(is_null($address)){
            $address = AddressDoge::find($id);
            if(!is_null($address)){
                $address=$address->attributes;
                Session::put('addressDoge', $address);
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    
    public static function getAddress(){
        return Session::get('addressDoge');
    }
}
