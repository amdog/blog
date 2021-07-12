<?php
    if($_COOKIE && array_key_exists('who_login_this',$_COOKIE)){
        echo "{\"name\":\"{$_COOKIE['who_login_this']}\"}";
    }
?>
