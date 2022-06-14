<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Utente;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

class LoginController extends Controller {


    protected function check_login(Request $request)
    {
        $request->all();
    
        $check = Utente::where("username", $request->username)->where("pass", $request->pass)->first();
        
    
     
    
        if ($check!=null) 
        {
               Session::put('username', $request->username);
               return redirect('home');
        } 
         else 
        {

            return view('login')->with("error", "Campi non validi");
        }
        
        
    }





    
}
?>