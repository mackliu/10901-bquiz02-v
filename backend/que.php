<fieldset>
    <legend>新增問卷</legend>
    <form action="api/add_que.php" method="post">
        <table>
            <tr>
                <td>問卷名稱</td>
                <td><input type="text" name="subject" id="subject"></td>
            </tr>
            <tr>
                <td colspan="2" id="opt">
                    選項<input type="text" name="option[]" ><input type="button" value="更多" onclick="more()">
                </td>
                
            </tr>
        </table>
        <div class="ct"><input type="submit" value="新增"><input type="reset" value="清空"></div>
    </form>
</fieldset>
<script>
function more(){
    let opt=`選項<input type="text" name="option[]" ><br>`
    $("#opt").prepend(opt)
}
</script>