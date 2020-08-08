<?php

$que=$Que->find($_GET['q']);
$options=$Que->all(['parent'=>$_GET['q']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></legend>
    <p style="font-weight:bolder;"><?=$que['text'];?></p>
    <form action="api/vote.php" method="post">
        <?php
        foreach($options as $opt){
        ?>
        <p>
            <input type="radio" name="opt" value="<?=$opt['id'];?>">
            <?=$opt['text'];?>
        </p>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>
</fieldset>
