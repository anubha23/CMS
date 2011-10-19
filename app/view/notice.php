<?php require_once('header.php') ;?>
<div class="main row">
  <p class="alert-message <?php print $this->notice['type'] ;?>"><?php print $this->notice['message'] ;?></p>
</div>
<?php require_once('footer.php') ;?>