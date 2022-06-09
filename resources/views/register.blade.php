@extends('layouts.register_login_layout')

@section('title', 'Registrazione Cinesocial')


@section('scripts')
        <link rel="stylesheet" href="/css/register.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/js/register.js" defer="true"></script>
@endsection

@section('class', 'register_container')

@section('form')
                <form action="{{ url('register') }}" name="register_form" method="post" enctype="multipart/form-data">
                @csrf 
                        <p id="welcome">Registrazione</p>
                        <div>
                            <label>Nome<input type="text" name="nome"> <p class="hidden_error"></p></label>
                            <label>Cognome<input type="text" name="cognome"><p class="hidden_error"></p></label>
                        </div>
                        
                        <div>
                            <label>Username<input type="text" name="username"><p class="hidden_error"></p></label>
                            <label>Email<input type="text" name="email"><p class="hidden_error"></p></label>
                        </div>
                        
                        <div>
                            <label>Password<input type="password" name="pass"><p class="hidden_error"></p></label>
                            <label>Conferma Password<input type="password" name="conf_pass"><p class="hidden_error"></p></label>
                        </div>

                        <div>
                            <label>Foto Profilo<input type="file" name="image"></label>
                        </div>
                        

                        <div id="invio">
                            <input type="submit" name="access" value="Registrati">    
                        </div>
                        <!--Lo spazio si fa con Alt+255 -->
                        <div>Hai già un account?  <a href="/">Accedi</a></div>

                        @isset($error)
                             <p class="error"> {{$error}} </p>
                        @endisset
                    
                </form>
@endsection