<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='published_post';

    protected $primarykey ='id';
    public $timestamps = false;
    protected $keytype = "int";

    public function user() {
        return $this->belongsTo("App\Models\Utente", 'username');
    }

    public function like() {
        return $this->belongsToMany("App\Models\Like", 'id_post');
    }




}

  

?>