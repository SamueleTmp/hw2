<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PicProfile extends Model
{
    protected $table='pic_profile';

    protected $primarykey ='username';
    protected $autoincrement = false;
    public $timestamps = false;
    protected $keytype = "string";

   
    public function user() {
        return $this->belongsTo('App\Models\Utente', 'username');
    }

}

?>