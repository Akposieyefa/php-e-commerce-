
<?php 

include "./include/header.php";

?>


<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(img/page-header/page-header-about-us.jpg);">
<div class="container">
<div class="row mt-5">
<div class="col-md-12 align-self-center p-static order-2 text-center">
<h1 class="text-9 font-weight-bold">Register</h1>

</div>
<div class="col-md-12 align-self-center order-1">
<ul class="breadcrumb breadcrumb-light d-block text-center">
<li><a href="index.html">Home</a></li>
<li class="active">Register</li>
</ul>
</div>
</div>
</div>
</section>



<div class="container pt-5">

<?php validate_user_registeration(); ?>

<div class="row justify-content-md-center">
<div class="col-md-9">
<div class="featured-box featured-box-primary text-left mt-0">
<div class="box-content">
<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
<form  id="frmSignUp" method="post" class="needs-validation" novalidate="novalidate">

<div class="form-row">
<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">First Name</label>
<input type="text" value=""  class="form-control" name="first_name" id="first_name" required="">
</div>

<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">Last Name</label>
<input type="text" value=""  class="form-control" name="last_name" id="last_name" required="">
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">Enter Date of Birth</label>
<input type="date" value=""  class="form-control" name="dob" id="dob" required="">
</div>

<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">Enter Phone Number</label>
<input type="text" value=""  class="form-control" name="phone_number" id="phone_number" required="">
</div>
</div>


<div class="form-row">
<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">Enter Email </label>
<input type="email" value=""  class="form-control" name="register_email" id="register_email" required="">
</div>

<div class="form-group col-lg-6">
<label class="required font-weight-bold text-dark text-2">State</label>
<input type="text" value=""  class="form-control" name="state" id="state" required="">
</div>
</div>


<div class="form-row">
<div class="form-group col-md-12">
<label class="font-weight-bold text-dark text-2">User Category</label>
<select data-msg-required="Please enter the subject." class="form-control" name="user_cat" id="user_cat" required="">
<option value="">Select Category</option>
<option value="Option 1">Lawyer</option>
<option value="Option 2">Professional</option>
<option value="Option 3">Individual</option>
</select>
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-12">
<label class="font-weight-bold text-dark text-2">Username</label>
<input type="text" name="username" id="username" value="" class="form-control form-control-lg" required="">
</div>
</div>

<div class="form-row">
<div class="form-group col-lg-6">
<label class="font-weight-bold text-dark text-2">Password</label>
<input type="password" name="password" id="password" value="" class="form-control form-control-lg" required="">
</div>
<div class="form-group col-lg-6">
<label class="font-weight-bold text-dark text-2">Re-enter Password</label>
<input type="password" name="confirm_password" id="confirm_password" value="" class="form-control form-control-lg" required="">
</div>
</div>
<div class="form-row">
<div class="form-group col-lg-9">
<input type="submit" value="Register" name="register" class="btn btn-primary btn-modern float-left" data-loading-text="Loading...">
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<br> <br> <br> <br>



<style type="text/css">
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

