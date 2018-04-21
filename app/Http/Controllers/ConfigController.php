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
    
    protected function validatorUpdatePassword(array $data)
    {
        return Validator::make($data, [
            'old' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    public function showMessageForm()
    {
        return view('contact');
    }
    
    public function message(){
        return "mensaje enviado";
    }
}
