<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use App\Models\Post;
use App\Models\Utente;
use App\Models\PicProfile;
use App\Models\Like;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

class ProfiloAltruiController extends Controller {


    protected function info_utente(){

        // $utente = Utente::where('username', Session::get('username'))->first();
         
         $picprofile = PicProfile::where('username', Session::get('ricerca_utenti'))->first();
 
         $picprofile = base64_encode($picprofile->picprofile);
 
 
         //Costruisco l'array
 
         $array =array();
 
         $array['picprofile']= $picprofile;
         $array['username']= Session::get('ricerca_utenti');
        
 
         return $array;
    }

    protected function upload_post(){

        //array che passo al file json
        $array_finale = array();
        $array_tmp = array();

        $post = Post::where('utente', Session::get('ricerca_utenti'))->get();
        $tmp = json_decode($post);


        if(count($tmp)>0){
            
            for($cont = 0; $cont<count($tmp); $cont++)
            {
                $array_tmp['anno']=$tmp[$cont]->anno;
                $array_tmp['descrizione']=$tmp[$cont]->descrizione;
                $array_tmp['durata']=$tmp[$cont]->durata;
                $array_tmp['nlike']=$tmp[$cont]->nlike;
                $array_tmp['titolo']=$tmp[$cont]->titolo;
                $array_tmp['url_poster']=$tmp[$cont]->url_poster;
                $array_tmp['id']=$tmp[$cont]->id;


                $id_post = $tmp[$cont]->id;

                $like = Like::where('username', Session::get('username'))->where('id_post', $id_post)->first();
                
                if($like)
                {
                    $array_tmp['like']="liked";
                }
                else
                {
                    $array_tmp['like']="unliked";
                }

                $array_finale[$cont]=$array_tmp;
            }

            return $array_finale;
        }
        
    }

     
}

?>