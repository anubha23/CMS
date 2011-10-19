<?php require_once('header.php') ;?>
 <div class="main row">
    <h1>user list</h1>
  <p class="alert-message"><?php print Session::getFlashMessage(); ?></p>
    <?php if ($this->list) :?>
    <table class="zebra-striped">
      <thead>
      	<tr>
      		<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
      		<th>Designation</th>
			<th>Operations</th>
      	</tr>
      </thead>
      <tbody>
        <?php foreach($this->list as $userlist) :?>
        <tr>
      		<td> <?php echo $userlist['user'];?></td>
<td> <?php echo $userlist['firstname'];?></td>
<td> <?php echo $userlist['lastname'];?></td>
<td> <?php echo $userlist['designation'];?></td>
<td><a href="<?php print Helper::url('user/edit/' . $userlist['ID']) ;?>" class="btn info">Edit</a> <a href="<?php print Helper::url('user/delete/' . $userlist['ID']) ;?>" class="btn danger">Delete</a></td>
      	</tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <p>
      <?php print Helper::link('user/add', 'Add a new user', array('class' => 'btn primary')) ;?>
    </p>
    <?php else: ?>
    <p class="alert-message danger">No users found.</p>
    <p><a href="<?php print Helper::url('user/add');?>" class="btn primary">Add a new user</a></p>
    <?php endif ;?>
    
  </div>
<?php require_once('footer.php') ;?>