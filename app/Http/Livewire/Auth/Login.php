<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email ='';
    public $password = '';
    public $remember;


    public function authenticate(){
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials,$this->remember)) {
            session()->regenerate(); 
            return redirect()->intended('admin-dashboard');
        }
         session()->flash('message', 'The provided credentials do not match our records.');
        return back();
    }

   
}
