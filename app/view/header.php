<!doctype html>
<html>
	<head>
    <title><?php print $this->title ;?></title>
    <link rel="stylesheet" href="<?php print BASE_PATH?>/css/bootstrap.min.css"/>
  </head>
	<body>
    <div class="container">
      <header class="row">
        <h1><?php print Helper::link('', 'CMSapp')?></h1>
        <ul class="tabs">
          <li <?php print (Helper::isActive('')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('') ;?>">home</a></li>
        <?php if (Session::get('isLoggedIn')) { ?> <li <?php print (Helper::isActive('article/add')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('article/add') ;?>">Add a new article</a></li><?php } ?>
          <?php if (Session::get('isLoggedIn')) { ?> <li <?php print (Helper::isActive('user/changepwd')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('user/changepwd') ;?>">Change your password</a></li><?php } ?>
		  <?php if (Session::get('isLoggedIn') && Session::get('designation')==1) { ?> <li <?php print (Helper::isActive('user/browse')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('user/browse') ;?>">Manage your users</a></li><?php }?>
		  <li <?php print (Helper::isActive('article/browse')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('article/browse') ;?>">Browse all articles</a></li>
		  <?php if (!Session::get('isLoggedIn')) { ?> <li <?php print (Helper::isActive('user/login')) ? 'class="active"' : '' ;?>><a href="<?php print Helper::url('user/login') ;?>">Login</a></li><?php }?>
        </ul>
        
      </header>