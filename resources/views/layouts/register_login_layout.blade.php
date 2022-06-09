<!DOCTYPE html>
<html>
    <head>

        <title>@yield('title')</title>

        @section('scripts')
        
        @show
    </head>

    <body>

            <div class= @yield('class')>
                <div class="left">
                    <img src="https://cdn.pixabay.com/photo/2017/11/24/10/43/ticket-2974645_960_720.jpg" alt="immagine_login">
                </div>
                <div class="right">
                    
                @section('form')
                @show
                        
                </div>
            </div>
            
    </body>
</html>