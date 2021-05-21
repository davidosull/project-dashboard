<?php
// Change AJAX spinner
add_filter('gform_ajax_spinner_url', 'spinner_url', 10, 2);
function spinner_url($image_src, $form)
{
  return get_bloginfo('template_url') . '/res/img/blank.png';
}


// Filter the Gravity Forms button for Client Communication
add_filter('gform_submit_button_2', 'form_submit_button_2', 10, 2);
function form_submit_button_2($button, $form)
{
  return "<button class='gform_button btn btn--accent' id='gform_submit_button_{$form['id']}'><span>Submit Form</span></button>";
}

// Filter the Gravity Forms button for Admin Update
add_filter('gform_submit_button_3', 'form_submit_button_3', 10, 2);
function form_submit_button_3($button, $form)
{
  return "<button class='gform_button btn btn--accent' id='gform_submit_button_{$form['id']}'><span>Notify Client</span></button>";
}