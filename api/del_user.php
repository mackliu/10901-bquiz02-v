<?php
include_once "../base.php";

if(!empty($_POST['del'])){
    foreach($_POST['del'] as $id){
        $User->del($id);
    }
}

to("../admin.php?do=user");
?>