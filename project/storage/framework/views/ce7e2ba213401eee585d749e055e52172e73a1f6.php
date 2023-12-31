<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('home.shop.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ,['cart_result'=> $response] -->
  <style type="text/css">
      .trackingnumber{
        font-size: 20px;
        font-weight: 700;

      }
      .order-tracking
      {
        text-align: center;
      }
      .oc-hr{
         font-weight: 700;
         border-color: #090808;
      }
  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <section class="p-b-65 p-t-30 m-t-80">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="thank-you-text">
                        <img src="<?php echo e(url('/assets/img/thankyou.png')); ?>"/>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 m-t-40">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="order-note">
                            <p>Your Order has been placed in our service queue and you will receive a notification from out dispatch shortly. We will let you know when your Shredding Service has been scheduled.</p>
                            <p>To view the status of your Order, click on the button below or save the tracking number for future inquiry.</p>
                        </div>
                         <hr class="oc-hr">
                        <div class="order-tracking">
                            <span class="title">Order tracking number</span>
                            <div class="trackingnumber">#<?php echo e(session()->get('order1')->order_number); ?></div>
                            <a href="<?php echo e(url('/shop-order-details/')); ?>/<?php echo e(session()->get('order1')->id); ?>">Click to View Order Status</a>
                        </div>
                         <hr class="oc-hr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8 col-sm-offset-2">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Ending of product filter area -->
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <?php echo $__env->make('home.shop.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.shop.includes.master',['cart_result'=> $response], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>