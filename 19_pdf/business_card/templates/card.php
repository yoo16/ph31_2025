<?php
$color_title = $color_title ?? '#2d3436';
$color_name = $color_name ?? '#2d3436';
$color_info = $color_info ?? '#2d3436';
$bg_zoom = $bg_zoom ?? 100;
$bg_x = $bg_x ?? 50;
$bg_y = $bg_y ?? 50;

$bgStyle = "style=\"background-size: {$bg_zoom}%; background-position: {$bg_x}% {$bg_y}%;";
if (!empty($bg_base64)) {
  $bgStyle .= " background-image: url('{$bg_base64}');";
}
$bgStyle .= "\"";
?>
<div class="card" <?= $bgStyle ?>>
  <div class="name" style="color: <?= $color_name ?>"><?= $name ?></div>
  <div class="title" style="color: <?= $color_title ?>"><?= $title ?></div>
  <div class="info" style="color: <?= $color_info ?>">
    Email: <?= $email ?><br>
    Web: <?= $web ?><br>
    Tel: <?= $tel ?>
  </div>
</div>