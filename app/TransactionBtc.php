<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
                        $fecha=new \DateTime();
                        $fecha->setTimestamp($tx->time);
                        $update->fecha =$fecha->format('Y-m-d H:i:s');
                        $update->save();
                    }
                    break;
                }
            }
        }
    }
    
    public static function getTransaction($skip,$take,$id){
        $tx=DB::table('transaction_btc')->where('usuario_id',$id)
                                        ->orderBy('fecha',	'desc')
                                        ->skip($skip)->take($take)->get();
        $html='';
        
        for($i=0;$i<count($tx);$i++){    
            if($tx[$i]->confirmacion==1){
                $color2 = 'style="color: #4ED6A2"';
                $estado='Aprobado';
            }else{
                $color2 = 'style="color: gray"';
                $estado='Pendiente'; 
            }
            if($tx[$i]->tipo==1){
                $color = 'style="color: #4ED6A2"';
                $sy='+';    
            }else{
                $color = 'style="color: #F97F7F"';
                $sy='-';
            }
            
            $fecha = new \DateTime($tx[$i]->fecha);
        
            $html=$html . '<tr>
                                <td>'. $fecha->format('d-m-Y H:i:s') .'</td>
                                <td>'. $tx[$i]->id .'</td>
                                <td>'. $tx[$i]->address .'</td>
                                <td '. $color .'>'. $sy . number_format($tx[$i]->monto, 8, '.', '') .'</td>
                                <td '. $color2.'>'. $estado .'</td>
                          </tr>';
        }
        return $html;
    }
    
     public static function getTransaction1($take,$id){
        return DB::table('transaction_btc')->where('usuario_id',$id)
                                        ->where('confirmacion',1)
                                        ->orderBy('fecha','desc')
                                        ->take($take)->get();
    }
    
    public static function total(){
        $total=Session::get('TBtc');
        return $total;
    }
    public static function ctotal(){
        $total = DB::table('transaction_btc')->count();
        Session::put('TBtc', $total);
    }
        
}
