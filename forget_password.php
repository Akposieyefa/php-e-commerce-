
<?php 

include "./include/header.php";

?>


<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(img/page-header/page-header-about-us.jpg);">
<div class="container">
<div class="row mt-5">
<div class="col-md-12 align-self-center p-static order-2 text-center">
<h1 class="text-9 font-weight-bold">Change Password</h1>

</div>
<div class="col-md-12 align-self-center order-1">
<ul class="breadcrumb breadcrumb-light d-block text-center">
<li><a href="index.html">Home</a></li>
<li class="active">Change Password</li>
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
<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Change Passwood</h4>
<form action="/" id="frmSignIn" method="post" class="needs-validation" novalidate="novalidate">
<div class="form-row">
<div class="form-group col">
<label class="font-weight-bold text-dark text-2">New Password</label>
<input type="text" name="username" value="" class="form-control form-control-lg" required="">
</div>
</div>
<div class="form-row">
<div class="form-group col">

<label class="font-weight-bold text-dark text-2">Confirm Password</label>
<input type="password" name="password" value="" class="form-control form-control-lg" required="">
</div>
</div>
<div class="form-row">

<div class="form-group col-lg-6">

<input type="submit" value="Change Password" class="btn btn- dds btn-modern float-right" data-loading-text="Loading...">
</div>
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
