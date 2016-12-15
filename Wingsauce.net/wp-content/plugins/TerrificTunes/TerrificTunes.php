<?php
/*
 Plugin Name: Terrific Tunes
 Plugin URI: http://wingsauce.net
 Description: Provides a way to show a music library by showing the tracks on an album
 Version: 1.0
 Author: Jeremy Martin
 Author URI: http://wingsauce.net
 License: GPL2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action( 'admin_menu','TT_menu' );

function TT_menu() {
    add_menu_page( 'Terrific Tunes','Terrific Tunes','manage_options','TT_menu','TT_menu_options' );
    add_submenu_page( 'TT_menu',"Add Terrific Tunes","Terrific Tunes Menu",'manage_options','TT_tunes_menu','TT_tune_options');
}

function TT_menu_options(){
    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  
  include( __DIR__ . '/TTUserOptionsPage.php' );
}

function TT_tune_options(){
    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  
  include( __DIR__ . '/TTManageTunesPage.php' );
}

register_activation_hook(__FILE__, TT_Activate);

$TT_prefix = 'TT_';

function TT_Activate(){
    global $TT_prefix;
    $TT_prefix='TT_';
    CreateDBTables();
}

function CreateDBTables(){
    CreateUsersTable();
    CreateAlbumsTable();
    CreateTracksTable();
    CreateAlbumTracksTable();
}

function CreateUsersTable() {
  global $TT_prefix;
  $schema = "usr varchar(20) NOT NULL, "
          . "email tinytext NOT NULL,  "
          . "pwd tinytext NOT NULL,  "
          . "primary KEY (usr)";
  CreateTable($TT_prefix . "Users", $schema);
}

function CreateAlbumsTable(){
    global $TT_prefix;
    $schema = "id int NOT NULL AUTO_INCREMENT, "
            . "name text NOT NULL, "
            . "primary key (id)";
    CreateTable($TT_prefix.'Albums',$schema);
}

function CreateTracksTable(){
    global $TT_prefix;
    $schema = "id int NOT NULL AUTO_INCREMENT, "
            . "name text NOT NULL, "
            . "artist text, "
            . "primary key (id)";
    CreateTable($TT_prefix.'Tracks',$schema);
}

function CreateAlbumTracksTable(){
    global $TT_prefix;
    $schema = "AlbumID mediumint(9) NOT NULL, "
            . "TrackID mediumint(9) NOT NULL, "
            . "primary key (AlbumID, TrackID)";
    CreateTable($TT_prefix."AlbumTracks",$schema);
}

function CreateTable($table_name, $schema){
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $table_name (" . $schema . ") $charset_collate;";
  $wpdb->query($sql);
}
