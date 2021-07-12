<?php
    if($_COOKIE && array_key_exists('who_login_this',$_COOKIE)){
        $data=json_decode($GLOBALS['HTTP_RAW_POST_DATA']);   
        $connect=mysqli_connect("localhost","root","b");
        mysqli_select_db( $connect, 'public' );
        mysqli_query($connect,"set names utf8");             
        if(isset($data->delete)){
            $result=mysqli_query($connect,"delete from linklist where link='{$data->delete->link}' and _name='{$data->delete->_name}'");
            echo "{\"status\":\"{$result}\"}";  
        }
        else{
        $data->link=addslashes($data->link);
        $data->src=addslashes($data->src);
        $result=mysqli_query($connect,"insert into linklist(_name,link,src) values ('{$_COOKIE['who_login_this']}','{$data->link}','{$data->src}')");
        echo "{\"status\":\"{$result}\"}";            
        }
    }
?>
