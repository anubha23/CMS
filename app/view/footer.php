    	<footer class="row">
        <p>A simple CMS App <?php if (isset($_SESSION['isLoggedIn'])) print Helper::link('user/logout', 'logout') ;?></p>
      </footer>
    </div>
  </body>
</html>