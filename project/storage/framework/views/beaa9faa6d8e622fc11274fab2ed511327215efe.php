<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="Simple Documentation for project NewsOcean.">
    <meta name="author" content="GeniusOcean">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(url('/')); ?>/assets/images/<?php echo e($settings[0]->favicon); ?>" />

    <title><?php echo e($settings[0]->title); ?> - Admin Panel</title>

    <link href="<?php echo e(URL::asset('assets2/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets2/font/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets2/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets2/js/owl-carousel/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets2/js/owl-carousel/owl.theme.css')); ?>">
    <link href="<?php echo e(URL::asset('assets2/css/bs-select.min.css')); ?>" rel="stylesheet">

    <style>
        .jumbotron {
            background-color: #fff !important;
        }
    </style>
</head>

<body>

    <div class="home-wrapper">
        <!-- Starting of login area -->
        <div class="jumbotron text-center">
            <h1 class="display-3">Thank you for signing up!</h1>
            <p class="lead"><strong>Please check your inbox for the account activation link.</strong></p>
            <hr>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="<?php echo e(url('/')); ?>" role="button">Continue to homepage</a>
            </p>
        </div>
        <!-- Ending of login area -->
    </div>

    <!-- jQuery -->
    <script src="<?php echo e(URL::asset('assets/js/jquery.min.js')); ?>"></script>
</body>

</html>