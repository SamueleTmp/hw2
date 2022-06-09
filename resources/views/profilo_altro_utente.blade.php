@extends('layouts.main_layout')

@section('title', 'CineSocial')

@section('scripts')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
     
        <link rel="stylesheet" href="/css/profilo.css">
        <link rel="stylesheet" href="/css/bacheca.css">
        
        <script src="/js/profilo_altri_utenti_post.js" defer="true"></script>
        <script src="/js/profilo_altri_utenti.js" defer="true"></script>

@endsection

@section('content-left')
<div class="flex_left"> <!--Questo div contiene le info sull'utente che prenderò dalla sessione-->

    <div class="up">
        
    </div>

            
</div>
            
@endsection

@section('content-center')
<div class="flex_center">

                
    <div class="bacheca">




    </div>



</div>
@endsection