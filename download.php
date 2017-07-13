<?php
$current_count = file_get_contents('count');
$f = fopen('count', 'w+');
fwrite($f, $current_count + 1);
fclose($f);
header("Location: comicbubbles.zip");
?>