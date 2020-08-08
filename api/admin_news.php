<?php
include_once "../base.php";

foreach($_POST['id'] as $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $news=$News->find($id);
        $news['sh']=(in_array($id,$_POST['sh']))?1:0;
        $News->save($news);
    }
}

to("../admin.php?do=news");

?>