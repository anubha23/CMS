<?php

require_once('app/config.php');

class App{
  var $segment;
  function __construct() {

    // construct an array by breaking the URL. We'll use this to determine controller, method and parameters
    if(isset($_SERVER['PATH_INFO'])) {
      $segment_array = explode('/',$_SERVER['PATH_INFO']);
    }

    // Our URLS will be in the form - index.php/CONTROLLER/METHOD/PARAMETERS
    $this->segment->controller = (isset($segment_array[1]) && $segment_array[1]) ? $segment_array[1] : DEFAULT_CONTROLLER;  // if controller is not set from the URL, load a default
    $this->segment->method = (isset($segment_array[2]) && $segment_array[2]) ? $segment_array[2] : 'index';                 // if method is not set, load 'index' method
    $this->segment->param = (isset($segment_array[3])) ? $segment_array[3] : NULL;                                          // if parameters are not set, make them NULL
    
  }
  
  function init() {
  
    $controller = $this->segment->controller;
    $method = $this->segment->method;
    $param = $this->segment->param;
    
    $file = 'app/controller/' . $controller . '.php'; // The controller file
    
    // if file exists, include it
    if(file_exists($file)) {
      require_once($file);
      
      // if the method is callable(exists), call call it. Else call the 'error' method
      if(!is_callable($controller . '::' . $method)) {
        $method = 'error';
      }
      $app = new $controller;
      $app->{$method}($param);
    }
    
    // else shout that the controller was not found
    else die('The controller <b>' . $controller . '</b> doesn\'t exist');
  }
  
}

class DatabaseConn {
    var $conn;
        
    function __construct(){
      $this->conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
      mysql_select_db(DB_DATABASE);
      
      register_shutdown_function(array(&$this, 'closecon'));
    }

    function queryexec($query) {
      return mysql_query($query, $this->conn);
    }

    function getNumRows($res){
      return mysql_num_rows($res);
    }
    
    function fetchArray($res) {
        return mysql_fetch_array($res);
    }
    
    function closecon() {
      mysql_close($this->conn);
    }
}

class Load {
  public static function model($model) {
    require_once('app/model/' . $model . '.php');
    return new $model;
  }
  
  public static function view($file, $data) {
    $view = new View($file, $data);
    $view->render();
  }
}

class View {
    private $args;
    private $file;

    public function __get($name) {
        return $this->args[$name];
    }

    public function __construct($file, $args = array()) {
        $this->file = $file;
        $this->args = $args;
    }

    public function render() {
        require_once('app/view/' . $this->file);
    }
}

class Controller {
  function error() {
    die('404 Error!');
  }
}

class Helper {

  // A Helper function to create URLS
  public static function url($link) {
    return BASE_URL . $link;
  }
  
  public static function link($link, $text, $options = NULL) {
    $attrs = '';
    if($options) {
      foreach($options as $attr => $value) {
        $attrs .= $attr . '="' . $value . '" ';
      };
    }
    return '<a ' . $attrs . ' href="' . BASE_URL . $link . '">' . $text . '</a>';
  }
  
  public static function redirect($url) {
    Header('Location: ' . BASE_URL . $url);
    exit();
  }
  
  public static function isActive($url) {
    return (Helper::url($url) == $_SERVER['REQUEST_URI']) ? TRUE : FALSE;
  }
}

class Session {

  // Wrapper function to set a session
  public static function set($key, $value) {
    //session_destroy();
    $_SESSION[$key] = $value;
  }
  
  // Wrapper functio get a session
  public static function get($key) {
    return isset($_SESSION[$key]) ? $_SESSION[$key]: false;
  }
  
  public static function clear($key) {
    unset($_SESSION[$key]);
  }
  
  public static function setFlashMessage($value) {
    $_SESSION['flashData'] = $value;
  }
  
  public static function getFlashMessage() {
    $value = NULL;
    if(isset($_SESSION['flashData'])) {
      $value = $_SESSION['flashData'];
      unset($_SESSION['flashData']);
    }
    return $value;
  }
  
  public static function timeOut() {
  /*
    If TIME is SET find if the difference is greater than 300 milliseconds and return true. If it is not return false. If TIME is NOT SET we don't do anything :)
    Now the translation of the above text yield the following statements:
  */
    if(isset($_SESSION['time'])) {
      if(time()-$_SESSION['time']>300)
        return true;
      else
        return false;
    }
    
    // We don't return false if time is not set because timeout returning false doesn't make any sense when time is not set
  }
}
