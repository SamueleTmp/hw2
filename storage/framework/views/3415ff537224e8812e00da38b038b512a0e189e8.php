

<?php $__env->startSection('title', 'Registrazione Cinesocial'); ?>


<?php $__env->startSection('scripts'); ?>
        <link rel="stylesheet" href="/css/register.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/js/register.js" defer="true"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('class', 'register_container'); ?>

<?php $__env->startSection('form'); ?>
                <form action="<?php echo e(url('register')); ?>" name="register_form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> 
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

                        <?php if(isset($error)): ?>
                             <p class="error"> <?php echo e($error); ?> </p>
                        <?php endif; ?>
                    
                </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.register_login_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/register.blade.php ENDPATH**/ ?>