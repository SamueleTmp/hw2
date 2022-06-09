

<?php $__env->startSection('title', 'Homepage CineSocial'); ?>

<?php $__env->startSection('scripts'); ?>
        <link rel="stylesheet" href="/css/homepage.css">
        <link rel="stylesheet" href="/css/bacheca.css">
        <link rel="stylesheet" href="/css/ricerca_film.css">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <script src="/js/homepage.js" defer="true"></script>
        <script src="/js/info_utente.js" defer="true"></script>
        <script src="/js/cerca_film.js" defer="true"></script>
        <script src="/js/upload_altri_utenti.js" defer="true"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content-left'); ?>


                <div class="flex_left"> <!--Questo div contiene le info sull'utente che prenderò dalla sessione-->
                    <div class="up">
                        
                    </div>

                    <div class="bottom">
                            <p>Cerca altri utenti!</p>
                            
                            <form action="<?php echo e(url('home/cerca_utente')); ?>" name="ricerca_utenti_form" method="get">
                            <?php echo csrf_field(); ?>
                                <input type="text" name="nome_utente" placeholder="Cerca username utenti">
                                <input type="submit" name="cerca_utente" value="Cerca" id="tasto">
                            </form>

                    </div>

                    <div class = "sub-bottom">

                    </div>

            
                </div>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content-center'); ?>

        <div class="flex_center">

            <div class="creazione">
            <form action="<?php echo e(url('home/OMDBapi')); ?>" name="creazione_form" method="post">
            <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content-right'); ?>

    <div class="flex_right">

        <div class="up">
            <p>Cerca le info su un film!</p>
            <form action="<?php echo e(url('home/cerca_film')); ?>" name="ricerca_film_form" method="get">
            <?php echo csrf_field(); ?>
                <input type="text" name="nome_film" placeholder="Cerca il nome del film" class="left">
                <input type="submit" name="cerca_film" value="Cerca" id="tasto">
            </form>

        </div>
                    
        <div class="bottom">

        </div>
            
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/home.blade.php ENDPATH**/ ?>