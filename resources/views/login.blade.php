@extends('layouts.register_login_layout')

@section('title', 'Login Cinesocial')

@section('scripts')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/login.css">
        <script src="/js/login.js" defer="true"></script>
@endsection
       
@section('class', 'login_container')

@section('form')
                    <form action="{{ url('login') }}" name="login_form" method="post">
                    @csrf
                            <p id="welcome">Benvenuto su CineSocial!</p>
                            <div>
                                <label>Username<input type="text" name="username"></label>
                            </div>
                            <div>
                                <label>Password<input type="password" name="pass"></label>
                            </div>
                            <div id="invio">
                                <input type="submit" name="access" value="Accedi">    
                            </div>
                            <!--Lo spazio si fa con Alt+255 -->
                            <div>Non sei iscritto?  <a href="/register">Registrati</a></div>

                            @isset($error)
                             <p class="error"> {{$error}} </p>
                            @endisset

                    </form>
@endsection  
