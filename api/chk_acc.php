<?php
include_once "../base.php";

$acc=$_GET['acc'];
$user=$User->find(['acc'=>$acc]);
if(empty($user)){
    echo 0;
}else{
    echo 1;
}


?>