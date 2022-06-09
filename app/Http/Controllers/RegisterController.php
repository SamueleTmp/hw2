<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Utente;
use App\Models\PicProfile;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

class RegisterController extends Controller {


    protected function create(Request $request)
    {
        $request->all();
      //$propic = $request->has('image') ? $request->file('image') : null;

       
        if($this->countErrors($request->all()) == 0) 
        {
            $user = new Utente;
            $user->username = $request->username;
            $user->pass = $request->pass;
            $user->nome  = $request->nome;
            $user->cognome  = $request->cognome;
            $user->email  = $request->email;

            $pic = new PicProfile;
            $pic->username = $request->username;
            $pic->picprofile = file_get_contents($request->file('image'));
            
         //   'propic' => $propic ?? null,
            if ($user->save() && $pic->save()) {
                Session::put('username', $request->username);
                return redirect('home');
            } 
            else {
                
                return view('register')->with("error", "Campi non validi");
            }
        }
        else 
            return view('register')->with("error", "Campi non validi");
        
    }

    

    private function countErrors($data) {

        //$error = array();
        $cont_error = 0 ;

        
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $cont_error++;
        } else {
            $username = Utente::where("username", $data['username'])->first();
            if ($username != null) {
                $cont_error++;
            }

        }
        # PASSWORD
        if (strlen($data["pass"]) < 5) {
            $cont_error++;
        } 
        # CONFERMA PASSWORD
        if (strcmp($data["pass"], $data["conf_pass"]) != 0) {
            $cont_error++;
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $cont_error++;
        }
    

        return  $cont_error;
        
    }

    public function checkUsername($query) { 
        $exist = Utente::where('username', $query)->exists();
        return ['exists' => $exist];
    }

}
?>