<fieldset>
    <legend>會員登入</legend>
    <form>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="登入" onclick="login()"><input type="reset" value="清除">
                </td>
                <td>
                    <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚末註冊</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>
<script>

function login(){
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    $.get("api/chk_acc.php",{acc},function(res){
        if(res=='1'){
            $.get("api/chk_pw.php",{acc,pw},function(res){
                if(res=='1'){
                    if(acc=='admin'){
                        location.href="admin.php";
                    }else{
                        location.href="index.php";
                    }
                }else{
                    alert("密碼錯誤")
                    localtion.reload();
                }
            })
        }else{
            alert("查無帳號")
            location.reload();
        }
    })
}

</script>