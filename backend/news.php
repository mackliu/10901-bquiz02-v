<fieldset>
    <legend>最新文章管理</legend>
    <form action="api/admin_news.php" method="post">
        <table class="ct">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
                $total=$News->count();
                $div=3;
                $pages=ceil($total/$div);
                $now=(!empty($_GET['p']))?$_GET['p']:1;
                $start=($now-1)*$div;
                $posts=$News->all([]," limit $start,$div");
                foreach($posts as $k => $post){
                    $chk=($post['sh']==1)?"checked":"";
            ?>
            <tr>
                <td><?=$post['id'];?></td>
                <td><?=$post['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$post['id'];?>" <?=$chk;?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$post['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$post['id'];?>">
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="ct">
        <?php
            if(($now-1)>0){
                echo "<a href='?do=news&p=".($now-1)."'> < </a>";
            }
            for($i=1;$i<=$pages;$i++){
                $font=($now==$i)?"24px;":"18px";
                echo "<a href='?do=news&p=$i' style='font-size:$font'> $i </a>";
            }
            if(($now+1)<=$pages){
                echo "<a href='?do=news&p=".($now+1)."'> > </a>";
            }


        ?>
        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>