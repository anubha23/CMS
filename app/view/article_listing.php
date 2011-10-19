<?php require_once('header.php') ;?>
  <div class="main row">
    <h1>Articles so far</h1>
    
    <?php if($this->list) :?>
    <table class="zebra-striped">
      <thead>
      	<tr>
      		<th>Title</th>
      		<?php if (isset($_SESSION['isLoggedIn'])){ ?><th>Action</th><?php } ?>
      	</tr>
      </thead>
      <tbody>
        <?php foreach($this->list as $article) :?>
        <tr>
      		<td><a href="<?php print Helper::url('article/view/' . $article['ID']) ;?>"><?php print $article['title'] ;?></a></td>
      		<?php if (isset($_SESSION['isLoggedIn'])){ ?><td><a href="<?php print Helper::url('article/edit/' . $article['ID']) ;?>" class="btn info">Edit</a> <a href="<?php print Helper::url('article/delete/' . $article['ID']) ;?>" class="btn danger">Delete</a></td><?php } ?>
      	</tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <p>
      <?php if (isset($_SESSION['isLoggedIn'])) { print Helper::link('article/add', 'Add new article', array('class' => 'btn primary')) ; } ?>
    </p>
    <?php else: ?>
    <p class="alert-message danger">No articles found.</p>
    <?php if (isset($_SESSION['isLoggedIn'])) { ?><p><a href="<?php print Helper::url('article/add') ;?>" class="btn primary">Add a new article</a></p><?php } ?>
    <?php endif ;?>
    
  </div>
<?php require_once('footer.php') ;?>