<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    public function giris(Request $request){
        if($request->method() == 'GET'){
            return view('admin.login');
        }
        else if($request->method() == 'POST'){
            $data = $request->only('email', 'password');
            if(Auth::attempt($data,$request->remember)){
                //BAŞARILI GİRİŞ
                //return Auth::user();
                return redirect(route('projeler.listele'))->with('login', 'success');
            }else{
                //HATALI GİRİŞ
                return redirect()->back()->with('login' , 'failed');
            }
        }
    }

    public function cikis(){
        auth()->logout();

        return redirect('Admin');
    }
    
}