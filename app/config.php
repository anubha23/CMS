<?php

// database related
$config['DB_HOST']     = 'localhost';
$config['DB_USER']     = 'root';
$config['DB_PASS']     = '';
$config['DB_DATABASE'] = 'cms';

// the default controller to be used
$config['DEFAULT_CONTROLLER'] = 'article';


foreach($config as $key => $value) {
  define($key,$value);
}
