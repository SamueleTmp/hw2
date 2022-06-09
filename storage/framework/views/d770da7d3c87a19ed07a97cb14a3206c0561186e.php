<!DOCTYPE html>
<html>
    <head>
        
        <title><?php echo $__env->yieldContent('title'); ?></title>
     
        <?php $__env->startSection('scripts'); ?>
        
        <?php echo $__env->yieldSection(); ?>
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

            <?php $__env->startSection('content-left'); ?>
                
            
                
            
            <?php echo $__env->yieldSection(); ?>

                
            <?php $__env->startSection('content-center'); ?>
            
            
            
            <?php echo $__env->yieldSection(); ?>

            <?php $__env->startSection('content-right'); ?>
            

            
            <?php echo $__env->yieldSection(); ?>

            </section>



            <footer>
                Powered By Samuele Tempio 1000002420 --- API From OMDB
            </footer>


        </article>
    </body>

</html><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/layouts/main_layout.blade.php ENDPATH**/ ?>