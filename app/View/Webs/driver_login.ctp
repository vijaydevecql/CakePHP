
 <section class="login_sign_up">
 <div class="container">
 <div class="row">
 <div class="col-xs-12 col-md-5 margin-bottom-30">
		 <div class="pop_left">
		 <h1 class="pop_hnd">My Account</h1>
		 <p>Lorem ipsum dolor sit amet, eu pri voluptaria efficiantur, quo ea feugiat legimus intellegebat. </p>
		 <p>Lorem ipsum dolor sit amet, eu pri voluptaria efficiantur, quo ea feugiat legimus intellegebat. </p>
		 </div>
		 </div>
         <div class="col-xs-12 col-md-7">
		 <div class="pop_rite">
		  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sign in As User</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sign in As Driver</a></li>
     
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	<form action="<?php  echo $this->webroot;?>webs/login" method="post">
	 <input type="hidden" name="type" value="1" >
	<div class="form-group">
	<div class="col-sm-6 col-xs-12">
	<label>Email</label>
	<input type="text" name="email" class="form-control">
	</div>
	<div class="col-sm-6 col-xs-12">
	<label>Password</label>
	<input type="text" name="password" class="form-control">
	</div>
	</div>
	
	<div class="form-group">
	<div class="col-sm-12 col-xs-12">
	 
	<input type="submit" name="" class="form-control pull-right" value="Sign In">
	</div>
	 
	</div>
	
	<div class="form-group">
	<div class="col-sm-6 col-xs-12">
	 
	<a class="fb" href=""><i class="fa fa-facebook"></i>Login with Facebook</a>
	</div>
	<div class="col-sm-6 col-xs-12">
	<a class="g" href=""><i class="fa fa-google-plus"></i>Login with Google+</a>
	</div>
	</div>
	
	<div class="form-group">
	<div class="col-sm-6 col-xs-12 text-center">
	 <span>Dono’t have an account    </span>
	<a class="s" href="<?php echo $this->webroot; ?>">Sign up</a>
	</div>
	<div class="col-sm-6 col-xs-12 text-center">
	<a class="f" href="">Forgot Password?</a>
	</div>
	</div>
	</form>
	</div>
	
	<div role="tabpanel" class="tab-pane" id="profile">
  <form action="<?php  echo $this->webroot;?>webs/driver_login" method="post">

   <input type="hidden" name="type" value="2" >
   
  <div class="form-group">
  <div class="col-sm-6 col-xs-12">
  <label>Email</label>
  <input type="text" name="email" class="form-control">
  </div>
  <div class="col-sm-6 col-xs-12">
  <label>Password</label>
  <input type="text" name="password" class="form-control">
  </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12 col-xs-12">
   
  <input type="submit" name="" class="form-control pull-right" value="Sign In">
  </div>
   
  </div>
  
  <div class="form-group">
  <div class="col-sm-6 col-xs-12">
   
  <a class="fb" href="">
  <i class="fa fa-facebook"></i>Login with Facebook</a>
  </div>
  <div class="col-sm-6 col-xs-12">
  <a class="g" href="">
  <i class="fa fa-google-plus"></i>Login with Google+</a>
  </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-6 col-xs-12 text-center">
   <span>Dono’t have an account    </span>
  <a class="s" href="<?php echo $this->webroot; ?>driver-signup">Sign up</a>
  </div>
  <div class="col-sm-6 col-xs-12 text-center">
  <a class="f" href="">Forgot Password?</a>
  </div>
  </div>
  </form>
	</div>
    
		 </div>
		 </div>
      </div>
 </div>
 </div>
 </section>
 
 <section class="login_bottom_content">
 <div class="container">
 <h1 class="login_hnd">
 YOUR FAVORITE PLACE DOESN’T DELIVER?
 NOW ITS ToGo!
 </h1>
 <div class="col-md-6 col-md-offset-3 col-xs-12">
 <img src="<?php echo $this->webroot ;?>aasets_web/images/v.png" width="100%">
 </div>
 
 </div>
 </section>
 
