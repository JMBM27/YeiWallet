<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
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
    
    public function showUpdatePasswordForm()
    {
        return view('update_psw');
    }
    
    public function updatePassword(Request $request){
        $this->validatorUpdatePassword($request->all())->validate();
        
        $user=User::find(Auth::user()->id);
        $passwordHash=$user->password;
        
        if(Hash::check($request->old,$passwordHash)){
            $user->fill([
                'password'=>Hash::make($request->password),
            ])->save();
            $request->session()->flash('status','Contaseña Actualizada');
            return back();
            
        }
        
        $request->session()->flash('error','Contaseña Actual Icorrecta');
        return back();
    }
    
    protected function validatorUpdatePassword(array $data){
        return Validator::make($data, [
            'old' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    public function showCodeForm(){
        return view('code');
    }
    
    public function updateCode(Request $request){
        $this->validatorCode($request->all())->validate();
        
        $user=User::find(Auth::user()->id);
        $passwordHash=$user->password;
        
        $code=str_random(10);
        
        if(Hash::check($request->password,$passwordHash)){
            if(isset($request->create)){
                $user->fill([
                    'pin_status'=>1,
                    'pin'=>$code
                ])->save();
                $mensaje='<br><br>¡Pin Activado!<br>
                        Su pin es <strong> '.$code.' </strong>';

                $request->session()->flash('titulo','Codigo');
                $request->session()->flash('imagen','Imagenes/password.svg');
                $request->session()->flash('notificacion',$mensaje);
                $request->session()->flash('pie','');
            }else{
                $user->fill(['pin_status'=>0])->save();
                $mensaje='<br><br>¡Pin Desactivado!<br>';

                $request->session()->flash('titulo','Codigo');
                $request->session()->flash('imagen','Imagenes/password.svg');
                $request->session()->flash('notificacion',$mensaje);
                $request->session()->flash('pie','');
            }
            
        
            return redirect('/dashboard');
            
        }
        
        $request->session()->flash('error','Contaseña Actual Icorrecta');
        return back();
    }
    
    protected function validatorCode(array $data){
        return Validator::make($data, [
            'password' => 'required',
        ]);
    }
    
    public function showMessageForm(){
        return view('contact');
    }
    
    public function message(){
        return "mensaje enviado";
    }
}
