<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionBtc extends Model
{
    protected $table = 'transaction_btc';
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id','txid','tipo','address','monto','confirmacion','fee','fecha',
    ];
    
    public static function actTransactionReceived($txs,$id,$address){
        $txant=DB::table('transaction_btc')->where('usuario_id',$id)->where('tipo',2)->take(25)->get();
        foreach($txs as $tx) {
            $esta=false;
            for($i=0;$i<count($txant);$i++){
                if($txant[$i]->txid == $tx->txid){
                    $esta=true;
                    break;
                }
            }
            if(!$esta){
                $txnew = new TransactionBtc;
                $txnew->txid = $tx->txid;
                $txnew->tipo = 2;
                $txnew->address = $tx->senders[0];
                $monto=0.0;
                foreach($tx->amounts_received as $amountReceived){
                    if ($amountReceived->recipient == $address) {
                        $monto=$monto+$amountReceived->amount;
                    }
                }	     
                $txnew->monto = $monto;
                $txnew->fee =0.0;
                if($tx->confidence>0.90){
                    $txnew->confirmacion = 1;   
                }else{
                    $txnew->confirmacion = 1;
                }
                $fecha=new \DateTime();
                $fecha->setTimestamp($tx->time);
                $txnew->fecha =$fecha->format('Y-m-d H:i:s');
                $txnew->usuario_id = $id;
                $txnew->save();
            }
        }
    }
    
    public static function actTransactionSent($txs,$id,$address){
        $txant=DB::table('transaction_btc')->where('usuario_id',$id)
                                           ->where('tipo',1)
                                           ->where('confirmacion',0)->get();
        foreach($txs as $tx) {
            for($i=0;$i<count($txant);$i++){
                if($txant[$i]->txid == $tx->txid){
                    if($tx->confidence>0.90){
                        $update=TransactionBtc::find($txant[$i]->id);
                        $update->confirmacion = 1;
                        $update->save();
                    }
                    break;
                }
            }
        }
    }
}
