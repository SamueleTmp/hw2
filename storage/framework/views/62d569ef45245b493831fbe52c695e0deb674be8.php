<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <?php $__env->startSection('scripts'); ?>
        
        <?php echo $__env->yieldSection(); ?>
    </head>

    <body>

            <div class= <?php echo $__env->yieldContent('class'); ?>>
                <div class="left">
                    <img src="https://cdn.pixabay.com/photo/2017/11/24/10/43/ticket-2974645_960_720.jpg" alt="immagine_login">
                </div>
                <div class="right">
                    
                <?php $__env->startSection('form'); ?>
                <?php echo $__env->yieldSection(); ?>
                        
                </div>
            </div>
            
    </body>
</html><?php /**PATH C:\xampp\htdocs\homework-laravel\resources\views/layouts/register_login_layout.blade.php ENDPATH**/ ?>