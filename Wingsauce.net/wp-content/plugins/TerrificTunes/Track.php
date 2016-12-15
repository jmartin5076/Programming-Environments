<?php
if (file_exists('../../../wp-config.php' ))
  {
  include_once('../../../wp-config.php' );
  }
else if (file_exists('./wp-config.php'))
  {
    include_once('./wp-config.php');
  }
  
  
  
class Track {
  public $name;
  public $artist;

  public function __construct($name, $artist)
  {
    $this->name = $name;
    $this->artist = $artist;
  }
  
  public function insert($table_name)
  {
    global $wpdb;
    $insert = "insert into " . $table_name . "(name, artist)" .
               "values ( " .
                   "'" . $this->name . "'," .
                   "'" . $this->artist . "'" .
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
                 "name = '" . $this->name . "', " .
                 "artist = '" . $this->artist . "', " .
               "where id = " . $id.
               ";";
    echo $update;
    $wpdb->query($update);
  }
  
  public static function get_all_tracks($table_name)
  {
      global $wpdb;
      $select = "select * from " . $table_name . ";";
      $all_tracks = $wpdb->get_results($select);
      return $all_tracks;
  }
}
