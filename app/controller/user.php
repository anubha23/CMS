<?php

class User extends Controller {
  
  function __construct() {
    $this->user = Load::model('user_model');
	if (isset($_SESSION['time']))
	{
      if (Session::timeOut())
        Helper::redirect('user/logout');
      else
        Session::set('time',time());
		}
  }
  
   function index() {
    //Session::setFlashMessage('hello');
  }
  
  function login() {
    if(isset($_POST['login'])) {
      $row = $this->user->ifloggedin($_POST['username'], $_POST['password']);
      if ($row) {
        Session::set('isLoggedIn',TRUE);
        Session::set('username',$_POST['username']);
        Session::set('designation',$row['designation']);
        Session::set('time',time());
        Helper::redirect('article');
      }
      else {
        echo 'Login failed';
      }
    }
    else{
      $data['title'] = 'Login';
      Load::view('login.php',$data);
    }
  }
  
  function logout() {
    Session::clear('isLoggedIn');
    Session::clear('username');
    Session::clear('designation');
    Session::clear('time');
    Helper::redirect('user/login');
  }
  
  function browse() {
    $userlist = $this->user->browse(10);
    $data = array(
      'title' => 'list of users',
      'list' => $userlist
    );
    Load::view('user_list.php',$data);
  }
  
  public function add() {// just having add makes sense as the URL would be user/add which is meaningful rather than user/add_user
    if ($_POST['filled']) {
      $result=$this->user->add($_POST['username'],$_POST['password'],$_POST['firstname'],$_POST['lastname']); // Need to sanitize $_POST for security
      $notice['message'] = ($result) ? 'New user added' : 'There was a problem adding the user to the database' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
      $userlist=$this->user->browse();
      $data = array(
        'title' => 'list of users',
        'list' => $userlist,
        'notice' => array(
            'type' => $notice['type'],
            'message' => $notice['message']));
      Load::view('user_list.php',$data);
    }
    
    else {
      $data = array(
        'title' => 'Add new user',
        'userdata' => NULL,
		'type'=>'add');
     Load::view('user_add.php', $data);
    }
  }
  
  public function delete($id)
  {
  $result=$this->user->delete($id);
  $notice['message'] = ($result) ? 'User deleted' : 'There was a problem deleting the user' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message'])
    );
	Load::view('user_list.php',$data);
  }
  
  public function edit($id = NULL)
  {
  if ($_POST['filled'])
  {
  $result=$this->user->edit($_POST['user_id'],$_POST['firstname'],$_POST['lastname'],$_POST['designation']);

   $userlist=$this->user->browse();
  $notice['message'] = ($result) ? 'User details updated' : 'There was a problem updating the user details' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
    $data = array(
        'title' => 'Notice',
        'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message']
        ) 
      ); 
      Load::view('notice.php', $data); 
    }
    else {
      $user_data = $this->user->read($id);
      $data = array(
        'title' => 'Edit user details',
        'type' => 'edit',
        'user_data' => $user_data,
        'user_id' => $id
      );
      Load::view('user_add.php', $data);
    }
  }

public function changepwd()
{
  if ($_POST['changesubmitted'])
  {
  $result=$this->user->changepwd($_SESSION['username'],$_POST['oldpwd'],$_POST['newpwd']);
  $val = ($result) ? 'Password changed successfully' : 'Password could not be changed' ;
      Session::setFlashMessage($val);
	  if ($result)
	  Helper::redirect('user/logout');
	  else
  {
  $userlist=$this->user->browse();
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  );
Load::view('user_list.php',$data); //make a notice page for Password Changed
}
  }
  
  else
  {
   $data = array(
        'title' => 'Change password',
        'data' => NULL
      );
      Load::view('change_password.php', $data);
  }
  }  
}
