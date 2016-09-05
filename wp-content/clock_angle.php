<?php
function clock_angle_form() {
  ?>
  <form name="clockform" method="POST" onsubmit="return form_validation()" action="../customer-details.php">
  Your Name: <input type="text" id="customer_name" name="customer_name" /><br />
  Your Email: <input type="text" id="customer_email" name="customer_email" /><br />
  Sex: <input type="radio" name="customer_sex" value="male">Male <input type="radio" name="customer_sex" value="female">Female<br />
  Your Age: <input type="text" id="customer_age" name="customer_age" /><br />
  <input type="submit" value="Submit"/>
  </form>
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
