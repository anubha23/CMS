<?php require_once('header.php') ;?>
      <div class="main row">
        <form action="<?php print Helper::url('user/changepwd');?>" method="post" class="form-stacked">
          <fieldset>
            <legend>Change your password</legend>
			<div class="clearfix">
            	<label>Enter old password:</label>
            	<div class="input"><input name="oldpwd" type="password"/></div>
            </div>
			<div class="clearfix">
            	<label>Enter new password:</label>
            	<div class="input"><input name="newpwd" type="password"/></div>
            </div>
            
            <div class="actions">
              <input type="hidden" name="changesubmitted" value=="true" />
              <input class="btn primary" type="submit" value="Change" />
            </div>
          </fieldset>
        </form>
      </div>
<?php require_once('footer.php') ;?>