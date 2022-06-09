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

class HomepageController extends Controller {


    protected function info_utente(){

        
        $picprofile = PicProfile::where('username', Session::get('username'))->first();

        $picprofile = base64_encode($picprofile->picprofile);

        $post_pubblicati = Utente::join('published_post', 'utenti.username', '=', 'published_post.utente')->where('utenti.username', Session::get('username'))->count();
      
        $like_messi = Like::where('username', Session::get('username'))->count();


        $like_ricevuti = Post::where('utente', Session::get('username'))->sum('nlike');


        //Costruisco l'array

        $array =array();

        $array['like_fatti']= $like_messi;
        $array['like_ricevuti']= $like_ricevuti;
        $array['picprofile']= $picprofile;
        $array['post_pubblicati']= $post_pubblicati;
        $array['username']= Session::get('username');
       

        return $array;
        
    }
 
    
    protected function upload_post(){

        //array che passo al file json
        $array_finale = array();
        $array_tmp = array();

        $post = Post::inRandomOrder()->limit(10)->get();
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

    protected function create_post(Request $request){

        $array = array();


        $nome_film = $request->get('nome_film');
        $descrizione = $request->get('descrizione');

        $curl = curl_init();

        $endpoint_completo = "http://www.omdbapi.com/?apikey=d005fec5&t=".$nome_film;


        curl_setopt($curl, CURLOPT_URL, $endpoint_completo);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //Questo lo restituisco al javascript
        $result = curl_exec($curl);

        $tmp = json_decode($result, true);

        $lunghezza = count($tmp);

        //se è minore di 3 mi restituisce un json di errore
       
        if($lunghezza > 3 )
        {

            //Li salvo nel DB
            $post = new Post;

            $post->utente = Session::get('username');
            $post->titolo = $nome_film;
            $post->anno = $tmp['Year'];
            $post->durata = $tmp['Runtime'];
            $post->descrizione = $descrizione;
            $post->url_poster = $tmp['Poster'];

            $post->save();


            //Mando il file json
            $array['anno']=$tmp['Year'];
            $array['descrizione']=$descrizione;
            $array['durata']=$tmp['Runtime'];
            $array['id'] = $post->id;
            $array['nlike']="0";
            $array['titolo']=$nome_film;
            $array['url_poster']=$tmp['Poster'];
            $array['utente']=Session::get('username');
            $array['like']="unliked";


            
            curl_close($curl);

            return $array;

        }
        else
        {
            $array['success'] = "Il film non esiste!";
            
            curl_close($curl);
            
            return $array;
        }

    }

    protected function like($id_post){

        $like = new Like;

        $like->id_post = $id_post;
        $like->username = Session::get('username');

        $like->save();

    }

    protected function unlike($id_post){

        $unlike = Like::where('username', Session::get('username'))->where('id_post', $id_post);

        $unlike->delete();

    }

    protected function cerca_film($nome_film){

        $curl = curl_init();

        $endpoint_completo = "http://www.omdbapi.com/?apikey=d005fec5&t=".$nome_film;


        curl_setopt($curl, CURLOPT_URL, $endpoint_completo);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //Questo lo restituisco al javascript
        $result = curl_exec($curl);

        $tmp = json_decode($result, true);

        $lunghezza = count($tmp);

        //se è minore di 3 mi restituisce un json di errore
       
        if($lunghezza > 3 )
        {  
            curl_close($curl);
            return $result;
        }
        else
        {
            $array =array();
            $array['success'] = "Il film non esiste!";
            
            curl_close($curl);
            
            return $array;
        }

       

    }

    protected function cerca_utente($nome_utente){

        $array = array();

        $user = Utente::where('username', $nome_utente)->first();

        $picprofile = PicProfile::where('username', $nome_utente)->first();

        $picprofile = base64_encode($picprofile->picprofile);

        //setto una variabile di sessione
        Session::put('ricerca_utenti', $user->username);

        $array[0]=$user->username;
        $array[1]= $picprofile;


        return $array;

    }
}
?>