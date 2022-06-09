<!DOCTYPE html>
<html>
    <head>
        
        <title>@yield('title')</title>
     
        @section('scripts')
        
        @show
    </head>

    <body>
        
            <header>
                <nav>
                        <a href="/home">Home</a>
                        <h1>CineSocial</h1>
                        <a href="/profilo">Profilo</a>
        
                </nav>
                    
            </header>   
        <article>
            <section class="flex_container">

            @section('content-left')
                
            
                
            
            @show

                
            @section('content-center')
            
            
            
            @show

            @section('content-right')
            

            
            @show

            </section>



            <footer>
                Powered By Samuele Tempio 1000002420 --- API From OMDB
            </footer>


        </article>
    </body>

</html>