<?php $__env->startSection('content'); ?>
<style>
    .jumbotron {
    background-color:#fff !important;
}
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">


<div class="home-wrapper">
    <!-- Starting of login area -->
    <div class="jumbotron text-center" style="margin-top: 10%">
        <!-- <h1 class="display-3">Thank you for signing up!</h1> -->
        <p class="lead"><strong>We have sent the temporary password to the email you provided.
          <br>It will give you a link that will enable you to create a New Password.</strong></p>
        <hr>
        <p class="lead">
          <a class="btn btn-primary btn-sm" href="<?php echo e(url('signin/user')); ?>" role="button">Back to Sign In</a>
        </p>
      </div>
    <!-- Ending of login area -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('includes.newmaster2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>