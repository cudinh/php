<?php
$url = $_GET['url'];
$allow = ['gif', 'jpg', 'png'];  // allowed extensions
$img = file_get_contents($url);  // get image data from $url
$url_info = pathinfo($url);

// if allowed extension
if(in_array($url_info['extension'], $allow)) {
  $save_to = 'imgs/'. $url_info['basename'];  // add image with the same name in 'imgs/' folder
  if(file_put_contents($save_to, $img)) {
    $re = '<img src="'.  $save_to .'" title="'. $url_info['basename'] .'" />';
  }
  else $re = 'Unable to save the file';
}
else $re = 'Invalid extension: '. $url_info['extension'];

echo $re;  // output $re data   
?>