<?php require_once('header.php') ;?>
      <div class="main row">
       <div class="span8 offset4"> <form action="<?php print Helper::url('user/login');?>" method="post" class="form-stacked">
       <fieldset>
	<legend>Login</legend>
	<div class="main row">
  <p class="alert-message"><?php print Session::getFlashMessage(); ?></p>
</div>
	<div class="clearfix">
		<label>Username:</label>   
		<div class="input">
	<input type="text" name="username"></div>
              </div>
		<div class="clearfix">
		<label>Password</label>		
		<div class="input"><input type="password" name="password"></div>
</div>
         <div class="actions"> <input type="submit" name="login" value="Login" class="btn primary"></div>
      </form>
      </div>
</div>
<?php require_once('footer.php') ;?>
