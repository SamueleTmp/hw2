

<?php $__env->startSection('title', 'CineSocial'); ?>

<?php $__env->startSection('scripts'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
     
        <link rel="stylesheet" href="/css/profilo.css">
        <link rel="stylesheet" href="/css/bacheca.css">
        
        <script src="/js/profilo_altri_utenti_post.js" defer="true"></script>
        <script src="/js/profilo_altri_utenti.js" defer="true"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-left'); ?>
<div class="flex_left"> <!--Questo div contiene le info sull'utente che prenderò dalla sessione-->

    <div class="up">
        
    </div>

            
</div>
            
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-center'); ?>
<div class="flex_center">

                
    <div class="bacheca">




    </div>



</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/profilo_altro_utente.blade.php ENDPATH**/ ?>