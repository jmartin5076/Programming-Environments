<?php

/*
Plugin Name: TuneTown
Plugin URI: http://tunetown.wingsauce.net
Description: Embeds a youtube video in the background for hands-free listening pleasure.
Version: 1.0
Author: Jeremy Martin and Corey McLaughlin
Author URI: http://authors.wingsauce.net
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/

class tunetown extends WP_Widget
{
    function _construct()
    {
        $widget_option = array('classname'=>'tunetown','description'=>'Embed a Youtube video in the background to listen to music while you browse.');
        parent::WP_Widget('tunetown','TuneTown',$widget_options);
    }
    
    function widget($arg,$instance)
    {
        extract($arg,EXTR_SKIP);
        $youtubeid = ($instance['youtubeid']) ? $instance['youtubeid'] : '4Tr0otuiQuU';
        
        ?>
        
        <iframe width="0" height="0" src="http://youtube.com/embed/<?php echo $instance['youtubeid']; ?>?rel=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>

        <?php
        
    }
    
    function form($instance)
    {
        $default = array('youtubeid'=> '');
        $instance = wp_parse_args((array) $instance,$default);
        $youtubeid = $instance['youtubeid'];
        
        ?>
        
        <p><b>Youtube Music ID:</b></p>
 	<p><input type="text" name="<?php echo $this->get_field_name('youtubeid'); ?>" value="<?php echo esc_attr($youtubeid); ?>" /></p>
	<p><b>Example ID:</b></p>
	<p>https://www.youtube.com/watch?v=<b style="color:#c0392b;">YzjzOmiUJXY</b></p>
        
        <?php
        
    }
    
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
 	$instance['youtubeid'] = strip_tags($new_instance['youtubeid']);
 	return $instance;
    }
}

    function widget_init()
    {
        register_widget('tunetown');
    }
    
    add_action('widgets_init','widget_init');
    
    ?>