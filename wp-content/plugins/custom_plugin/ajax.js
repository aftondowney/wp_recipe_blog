jQuery(document).ready(function(){
  function submit_me() {
    jQuery.post(the_ajax_script.ajaxurl, jQuery("#clockAngleForm").serialize()
  ,
  function(response_from_clock_angle_action) {
  jQuery("#response_area").html(response_from_clock_angle_action);
  }
  );
  }
});
