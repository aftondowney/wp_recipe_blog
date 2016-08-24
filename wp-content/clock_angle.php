<?php
function clock_angle_form() {
  $form['hour'] = array(
      '#title' => 'Hour',
      '#type' => 'textfield',
      // '#element_validate' => array('element_validate_integer_positive'),
      '#description' => t("Enter an hour between 1 and 12"),
  );
  $form['minute'] = array(
      '#title' => 'Minutes',
      '#type' => 'textfield',
      // '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
      '#description' => t("Enter minutes between  0 and 60"),
  );
  $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Calculate Angle',
  );
  return $form;
}

function clock_angle_form_submit($form, &$form_state) {
    $hour = $form_state['values']['hour'];
    $minute = $form_state['values']['minute'];
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

    $_SESSION['clock_angle_output'] = $output;
    $form_state['redirect'] = 'clock_angle_success_page';
}
function clock_angle_success() {
    $output = $_SESSION['clock_angle_output'];
    return "Your answer is: " . $output . " degrees";
}
