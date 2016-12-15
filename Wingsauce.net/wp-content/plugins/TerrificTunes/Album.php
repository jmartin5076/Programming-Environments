<?php
if (file_exists('../../../wp-config.php' ))
  {
  include_once('../../../wp-config.php' );
  }
else if (file_exists('./wp-config.php'))
  {
    include_once('./wp-config.php');
  }
  
  
  
class Album {
  public $name;

  public function __construct($name)
  {
    $this->name = $name;
  }
  
  public function insert($table_name)
  {
    global $wpdb;
    $insert = "insert into " . $table_name . "(name)" .
               "values ( " .
                   "'" . $this->name ."'".
                   ")" .
                   ";";
    $wpdb->query($insert);    
  }
  
  public static function delete($table_name, $id)
  {
    global $wpdb;
    $delete = "delete from " . $table_name . " " .
              "where id=" . $id.
               ";";
    echo $delete;
    $wpdb->query($delete);
  }
  
  public function update($table_name, $id)
  {
    global $wpdb;
    $update = "update " . $table_name . " " .
              "set " .
                 "name = '" . $this->name . 
               "where id = " . $id.
               ";";
    echo $update;
    $wpdb->query($update);
  }
  
  public static function get_all_albums($table_name)
  {
      global $wpdb;
      $select = "select * from " . $table_name . ";";
      $all_albums = $wpdb->get_results($select);
      return $all_albums;
  }
}
