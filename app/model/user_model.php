<?php

class User_model {
  
  var $con;
  
  function __construct() {
    $this->con = new DatabaseConn();
  }
  
  public function browse() {
  $i=0;
  $result=NULL;
  $rows=$this->con->queryexec('Select * from cmsusers');
  while($row=$this->con->fetchArray($rows)){
  $result[$i]=$row;
  $i++;
  }
  return $result;
  }
  
  public function read($user_id) {
  return mysql_fetch_object($this->con->queryexec('SELECT user,firstname,lastname,designation FROM cmsusers WHERE ID = '.$user_id));
  }
  
  public function edit($user_id,$firstname,$lastname,$designation) {
  return $this->con->queryexec("UPDATE cmsusers SET firstname='".$firstname."',lastname='".$lastname."',designation='".$designation."' where ID='".$user_id."'");

  }
  
  public function add($username, $password, $firstname, $lastname) {
    $rows=$this->con->queryexec("INSERT INTO cmsusers (user,pass,firstname,lastname) VALUES (". "'".$username."'".", ".
"PASSWORD('".$password."')".",'".$firstname."','".$lastname."')");
return $rows;
  }
  
  public function delete($user_id) {
    return $this->con->queryexec('DELETE FROM cmsusers WHERE ID = '.$user_id);
  }
  
  public function changepwd($username, $oldpassword, $newpassword) {
  $result=$this->con->queryexec("Select user, pass from cmsusers where user='".$username."' and pass=PASSWORD('".$oldpassword."')");
  if($this->con->getNumRows($result)>0)
  return $this->con->queryexec("UPDATE cmsusers SET pass=PASSWORD('".$newpassword."') where user='".$username."' and pass=PASSWORD('".$oldpassword."')");
  else
  return false;
  }
  
  public function ifloggedin($us,$pa)
  {
  $rows = $this->con->queryexec("SELECT * FROM cmsusers WHERE user = '".$us."' AND pass = PASSWORD('".$pa."')");
    if ($this->con->getNumRows($rows) > 0)
  {
    $row=$this->con->fetchArray($rows);
    return $row;
  }
  else
  return false;
  }
  
}
