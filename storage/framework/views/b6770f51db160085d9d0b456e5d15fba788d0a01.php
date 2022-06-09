

<?php $__env->startSection('title', 'Login Cinesocial'); ?>

<?php $__env->startSection('scripts'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/login.css">
        <script src="/js/login.js" defer="true"></script>
<?php $__env->stopSection(); ?>
       
<?php $__env->startSection('class', 'login_container'); ?>

<?php $__env->startSection('form'); ?>
                    <form action="<?php echo e(url('login')); ?>" name="login_form" method="post">
                    <?php echo csrf_field(); ?>
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

                            <?php if(isset($error)): ?>
                             <p class="error"> <?php echo e($error); ?> </p>
                            <?php endif; ?>

                    </form>
<?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.register_login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/login.blade.php ENDPATH**/ ?>