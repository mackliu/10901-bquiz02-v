<?php

$que=$Que->find($_GET['q']);
$options=$Que->all(['parent'=>$_GET['q']]);
?>
<style>
.line,.num{
    display:inline-block;
}
.line{
    width:70%;
    background:#ccc;
    height:20px;
}
.num{
    max-width:25%;
}
</style>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></legend>
    <p style="font-weight:bolder;"><?=$que['text'];?></p>
    <table>
    <?php
    foreach($options as $k => $opt){
        $tt=($que['count']==0)?1:$que['count'];
        $rate=round($opt['count']/$tt,2);
    ?>
        <tr>
            <td width="50%"><?=($k+1);?>.<?=$opt['text'];?></td>
            <td width="50%">
            <div class="line" style="width:<?=(70*$rate);?>%"></div>
            <div class="num"><?=$opt['count'];?>票(<?=$rate*100;?>%)</div>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
        <div class="ct"><button onclick="location.href='index.php?do=que'">返回</button></div>
</fieldset>
