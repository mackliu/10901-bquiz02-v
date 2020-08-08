<?php

include_once "../base.php";

$news=$_POST['id'];
$type=$_POST['type'];
$user=$_POST['user'];

switch($type){
    case 1:
        $Log->save(['user'=>$user,'news'=>$news]);
        $post=$News->find($news);
        $post['good']++;
        $News->save($post);
    break;
    case 2:
        $Log->del(['user'=>$user,'news'=>$news]);
        $post=$News->find($news);
        $post['good']--;
        $News->save($post);
    break;
}
