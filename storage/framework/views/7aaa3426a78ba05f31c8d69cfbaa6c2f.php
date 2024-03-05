<?php $__env->startSection('content'); ?>
    <?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('email.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/EJISCO Saas_v6.5/resources/views/email/common_email_template.blade.php ENDPATH**/ ?>