<?php
    include "./classes/auth.class.php";
    $login = new Auth();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userLogin'])) {
        $log = $login->login($_POST);
    }
    include "./include/header.php";
?>


<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(img/page-header/page-header-about-us.jpg);">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-9 font-weight-bold">Login</h1>

            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb breadcrumb-light d-block text-center">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<div class="container pt-5">

    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <div class="featured-box featured-box- dd text-left mt-0">
                <div class="box-content dd">
                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Welcome</h4>
                    <?php
                        if (isset($log)) {
                            echo $log;
                        }
                    ?>
                    <form action="" id="frmSignIn" method="post" class="needs-validation" novalidate="novalidate">
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                <input type="text" name="email" value="" class="form-control form-control-lg" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <a class="float-right" href="#">(Lost Password?)</a>
                                <label class="font-weight-bold text-dark text-2">Password</label>
                                <input type="password" name="password" value="" class="form-control form-control-lg" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="rememberme" class="custom-control-input" id="rememberme">
                                    <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">

                                <input type="submit" name="userLogin" value="Login" class="btn btn- dds btn-modern float-right" data-loading-text="Loading...">
                            </div>
                            <a class="" href="./register">(Don't have an Account? Register now)</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br> <br> <br> <br>



    <style type="text/css">
        .dd{
            border-top-color: #c89e59 !important;

        }
        .dds{

            background: #c89d58;
        }
        #footer .footer-ribbon {
            background: #c89d58;
        }


        html .text-color-primary, html .text-primary {
            color: #c89d58!important;
        }

        .list.list-icons li>[class*=fa-]:first-child, .list.list-icons li a:first-child>[class*=fa-]:first-child, .list.list-icons li>.icons:first-child, .list.list-icons li a:first-child>.icons:first-child {
            color: #c89d58;
            border-color: #c89d58;
        }

        html .bg-color-primary, html .bg-primary{
            background-color:#c89d58!important;
        }

        #header .header-nav.header-nav-links nav>ul:not(:hover)>li>a.active{
            color: #c89d58;
        }
        #header .header-nav.header-nav-links nav>ul>li>a:hover{
            color: #c89d58;
        }
        .loading-overlay {
            display: none;
        }
    </style>




</div>

<?php

include "./include/footer.php";

?>
