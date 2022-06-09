@extends('layouts.main_layout')

@section('title', 'Homepage CineSocial')

@section('scripts')
        <link rel="stylesheet" href="/css/homepage.css">
        <link rel="stylesheet" href="/css/bacheca.css">
        <link rel="stylesheet" href="/css/ricerca_film.css">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <script src="/js/homepage.js" defer="true"></script>
        <script src="/js/info_utente.js" defer="true"></script>
        <script src="/js/cerca_film.js" defer="true"></script>
        <script src="/js/upload_altri_utenti.js" defer="true"></script>
@endsection


@section('content-left')


                <div class="flex_left"> <!--Questo div contiene le info sull'utente che prenderò dalla sessione-->
                    <div class="up">
                        
                    </div>

                    <div class="bottom">
                            <p>Cerca altri utenti!</p>
                            
                            <form action="{{ url('home/cerca_utente') }}" name="ricerca_utenti_form" method="get">
                            @csrf
                                <input type="text" name="nome_utente" placeholder="Cerca username utenti">
                                <input type="submit" name="cerca_utente" value="Cerca" id="tasto">
                            </form>

                    </div>

                    <div class = "sub-bottom">

                    </div>

            
                </div>
@endsection




@section('content-center')

        <div class="flex_center">

            <div class="creazione">
            <form action="{{ url('home/OMDBapi') }}" name="creazione_form" method="post">
            @csrf
                <textarea name="text_area" id="" cols="30" rows="10" placeholder="Dicci cosa ne pensi di..."></textarea>



                <div>
                    <input type="text" name="nome_film" placeholder="Cerca il nome del film" class="left">
                    <input type="submit" name="create" value="Creapost" class="right">
                </div>

            </form>

            </div>

            <div class="bacheca">



            </div>



        </div>

@endsection



@section('content-right')

    <div class="flex_right">

        <div class="up">
            <p>Cerca le info su un film!</p>
            <form action="{{ url('home/cerca_film') }}" name="ricerca_film_form" method="get">
            @csrf
                <input type="text" name="nome_film" placeholder="Cerca il nome del film" class="left">
                <input type="submit" name="cerca_film" value="Cerca" id="tasto">
            </form>

        </div>
                    
        <div class="bottom">

        </div>
            
    </div>

@endsection

