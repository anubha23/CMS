<?php require_once('header.php') ;?>
      <div class="main row">
        <form action="<?php print Helper::url('user/' . $this->type);?>" method="post" class="form-stacked">
          <fieldset>
            <legend><?php print ($this->type == 'add') ? 'Add a new user' : 'Edit user' ;?></legend>
            <?php if ($this->type=='add'){ ?>
			<div class="clearfix">
            	<label>Username</label>
            	<div class="input"><input name="username"/></div>
            </div> <?php } ?>
			
			<?php if ($this->type=='add'){ ?>
			<div class="clearfix">
            	<label>Password</label>
            	<div class="input"><input name="password" type="password"/></div>
            </div> <?php } ?>
			
            <div class="clearfix">
            	<label>Firstname</label>
            	<div class="input"><input name="firstname" value="<?php print ($this->type == 'edit') ? $this->user_data->firstname : '' ;?>"></div>
            </div>
			<div class="clearfix">
            	<label>Lastname</label>
            	<div class="input"><input name="lastname" value="<?php print ($this->type == 'edit') ? $this->user_data->lastname : '' ;?>"></div>
            </div>
			<div class="clearfix">
            	<label>Designation</label>
            	<div class="input"><input name="designation" value="<?php print ($this->type == 'edit') ? $this->user_data->designation : '' ;?>"></div>
            </div>
			
            <div class="actions">
              <input type="hidden" name="filled" value=="true" />
              <?php if($this->type == 'edit') :?>
              <input type="hidden" name="user_id" value="<?php print $this->user_id ;?>" />
              <?php endif ;?>
              <input class="btn primary" type="submit" value="publish" />
            </div>
          </fieldset>
        </form>
      </div>
<?php require_once('footer.php') ;?>








