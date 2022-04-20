<?php
$url = $_GET['url'];
$allow = ['gif', 'jpg', 'png'];  // allowed extensions
$img = file_get_contents($url);
$url_info = pathinfo($url);

// if allowed extension
if(in_array($url_info['extension'], $allow)) {
  // Format the image SRC:  data:{mime};base64,{img_data_base64};
  $src = 'data:image/'. $url_info['extension'] .';base64,'. base64_encode($img);

  // add the base64 image into a <img> to display it
  $re = '<img src="'. $src .'" alt="'. $url_info['basename'] .'" />';
}
else $re = 'Invalid extension: '. $url_info['extension'];

echo $re;
?>