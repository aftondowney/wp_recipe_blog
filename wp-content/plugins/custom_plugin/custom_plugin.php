<?php
    /*
    Plugin Name: My Custom Plugins
    Plugin URI:
    https://github.com/aftondowney/wp_portfolio.git
    Description: Plugin that contains some smaller exercises that I wrote while at Epicodus. Displayed as widgets.
    Author: Afton Downey
    Version: 1.0
    Author URI: https://github.com/aftondowney
    */

    // enqueue and localise scripts
     wp_enqueue_script( 'clock-ajax-handle', plugin_dir_url( __FILE__ ) . 'ajax.js', array( 'jquery' ) );
     wp_localize_script( 'clock-ajax-handle', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
     // THE AJAX ADD ACTIONS
     add_action( 'wp_ajax_the_ajax_hook', 'clock_angle_action' );
     add_action( 'wp_ajax_nopriv_the_ajax_hook', 'clock_angle_action' ); // need this to serve non logged in users
     // THE FUNCTION
     function clock_angle_action(){
     /* this area is very simple but being serverside it affords the possibility of retreiving data from the server and passing it back to the javascript function */
     $hour = $_POST['hour'];
     $minute = $_POST['minute'];
     $hour_degree = "";
     $minute_degree = "";
     $output = "";

     if($hour <= 6) {
         $hour_degree = ($hour * 30);
     } elseif($hour > 6 && $hour < 12) {
         $hour_degree = ($hour - 6) * 30;
     } else {
         $hour_degree = 0;
     }

     if ($minute <= 30) {
         $minute_degree = $minute * 6;
     } elseif($minute > 30 && $minute < 60) {
         $minute_degree = ($minute - 30) * 6;
     } else {
         $minute_degree = 0;
     }

     if ($hour_degree > $minute_degree) {
         $output = $hour_degree - $minute_degree;
     } elseif ($minute_degree > $hour_degree) {
          $output = $minute_degree - $hour_degree;
     }
     else {
         $output = 0;
     }
     echo _e("Your answer is: " . $output . " degrees"); // this is passed back to the javascript function
     die();// wordpress may print out a spurious zero without this - can be particularly bad if using json
     }
     // ADD EG A FORM TO THE PAGE
     function clock_angle_ajax_frontend(){
     $clock_angle_form = '
     <form id="clockAngleForm">
     <input id="hour" name="hour" value = "hour" type="text" />
     <input id="minute" name="minute" value = "minute" type="text" />
     <input name="action" type="hidden" value="the_ajax_hook" /> <!-- this puts the action the_ajax_hook into the serialized form -->
     <input id="submit_button" value = "Calculate" type="button" onClick="submit_me();" />
     </form>
     <div id="response_area">
     This is where we\'ll get the response
     </div>';
     return $the_form;
     }
     add_shortcode("ca_ajax_frontend", "clock_angle_ajax_frontend");
