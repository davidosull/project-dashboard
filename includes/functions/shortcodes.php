<?php

// YouTube shortcode
function inovo_shortcode_youtube($atts, $content = null)
{

  extract(shortcode_atts(array(
    'aspect' => '16by9'
  ), $atts));

  return '<div class="embed embed--' . $aspect . '"><iframe width="640" height="360" src="https://www.youtube.com/embed/' . $content . '?showinfo=0&amp;modestbranding=1&amp;autohide=1&amp;rel=0" frameborder="0" allowfullscreen=""></iframe></div>';
}
add_shortcode('youtube', 'inovo_shortcode_youtube');
