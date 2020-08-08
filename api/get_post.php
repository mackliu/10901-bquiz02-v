<?php
include_once "../base.php";
$id=$_GET['id'];
$list=$News->find($id);
echo nl2br($list['text']);
?>