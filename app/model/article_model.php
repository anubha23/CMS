<?php

class Article_model {
  var $con;
  
  function __construct() {
    $this->con = new DatabaseConn();
  }
  
  /**
   * Browse the articles
   */
  public function browse($no_of_articles, $option = NULL) {
    $result = NULL;
    switch ($option) {
      case 'timewise':
      $rows=$this->con->queryexec('SELECT DISTINCT DATE_FORMAT( titletime,\'%M, %Y\' ) as time1 FROM cmsarticles');
	  while ($row = mysql_fetch_array($rows)){
        $result[$i] = $row;
        $i++;
		}
      break;
      
      default:
      $rows=$this->con->queryexec('SELECT * FROM cmsarticles ORDER BY ID DESC LIMIT 0,10');
      $i = 0;
      while($row = mysql_fetch_array($rows)){
        $result[$i] = $row;
        $i++;
      } 
      break;
    }
    
    return $result;
  }
  
  /**
   * Read an article by its id
   */
  public function read($article_id) {
    return mysql_fetch_object($this->con->queryexec('SELECT title,content FROM cmsarticles WHERE ID = '.$article_id));
  }
  
  /**
   * Edit an article by its id
   */
  public function edit($article_id, $title, $content) {
  $content = mysql_real_escape_string($content);
  $title=mysql_real_escape_string($title);
  $sql = "UPDATE cmsarticles set title='". $title ."',content='". $content ."',TitleTime=NOW() where id='". $article_id ."'"; // Not sure of the format UPDATE table set () VALUES() WHERE
    return $this->con->queryexec($sql);
  }
  
  /**
   * Add an article
   */
  public function add($title, $content) {
    $content = mysql_real_escape_string($content);
    $sql = "INSERT INTO cmsarticles (title,content,TitleTime) VALUES ('" .$title ."', '" . $content ."', NOW())";
    return $this->con->queryexec($sql);
  }
  
  /**
   * Delete an article by its id
   */
  public function delete($article_id) {
    return $this->con->queryexec('DELETE FROM cmsarticles WHERE ID = '.$article_id);
  }
  
  public function getArticleTitleById($id) {
    $result = $this->read($id);
    return $result->title;
  }
}