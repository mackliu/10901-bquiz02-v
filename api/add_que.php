<?php
include_once "../base.php";

$Que->save(['text'=>$_POST['subject'],'parent'=>0]);
$subject=$Que->find(['text'=>$_POST['subject']])['id'];

if(!empty($_POST['option'])){
    foreach($_POST['option'] as $opt){
        $Que->save(['text'=>$opt,"parent"=>$subject]);
    }
}

to("../admin.php?do=que");
?>