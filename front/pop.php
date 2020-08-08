<style>
.title{
    color:blue;
    cursor:pointer;
}

.pop{
    background:rgba(51,51,51,0.8); 
    color:#FFF; 
    min-height:100px; 
    width:300px; 
    position:fixed; 
    display:none; 
    z-index:9999; 
    overflow:auto;
}
</style>

<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="50%">內容</td>
            <td>人氣</td>
        </tr>
        <?php
            $total=$News->count();
            $div=5;
            $pages=ceil($total/$div);
            $now=(!empty($_GET['p']))?$_GET['p']:1;
            $start=($now-1)*$div;
            $posts=$News->all(['sh'=>1]," order by `good` desc limit $start,$div");
            foreach($posts as $k => $post){
        ?>
        <tr>
            <td class="title"><?=$post['title'];?></td>
            <td>
                <div class="abbr"><?=mb_substr($post['text'],0,20,'utf8');?>...</div>
                <div class="pop" style="display:none"><?=nl2br($post['text']);?></div>
            </td>
            <td>
                <span id="vie<?=$post['id'];?>"><?=$post['good'];?></span>個人說<img src="icon/02B03.jpg" style="width:20px;">
                -
                <?php
            if(!empty($_SESSION['login'])){

                $chk=$Log->find(['user'=>$_SESSION['login'],'news'=>$post['id']]);
                if(!empty($chk)){
            ?>
                <a href="#" id='good<?=$post['id'];?>' onclick="good('<?=$post['id'];?>','2','<?=$_SESSION['login'];?>')">收回讚</a>
            <?php
                }else{
            ?>
             <a href="#" id='good<?=$post['id'];?>' onclick="good('<?=$post['id'];?>','1','<?=$_SESSION['login'];?>')">讚</a>

            <?php
                }
            ?>
             
            <?php
            }
            ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div>
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
</fieldset>
<script>
$(".title").hover(function(){
    /* $(this).next().children().eq(0).toggle(); */
    $(this).next().children().eq(1).toggle();
})

</script>