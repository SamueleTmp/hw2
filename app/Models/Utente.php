<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table='utenti';

    protected $primarykey ='username';
    protected $autoincrement = false;
    public $timestamps = false;
    protected $keytype = "string";
    //protected $fillable = 'username';

    public function posts() {
        return $this->hasMany("App\Models\Post", 'utente');
    }

    public function likedPosts() {
        return $this->belongsToMany('App\Models\Post', 'username');
    }

    public function picprofile() {
        return $this->hasOne('App\Models\PicProfile', 'username');
    }

}

?>