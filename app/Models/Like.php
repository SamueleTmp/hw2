<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='liked_post';

    protected $primarykey = ['id_post', 'username'];
    protected $autoincrement = false;
    public $timestamps = false;
   
    public function user() {
        return $this->belongsTo("App\Models\Utente", 'username');
    }

    public function post() {
        return $this->belongsToMany("App\Models\Post", 'id');
    }
    


}

  

?>