<?php


function spacer($height){
    echo '<div style="height: '.$height.'px"></div>';
}


function redirect($location){
    header('Location: '.$location);
}

?>
