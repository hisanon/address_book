<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>Address Book</title>
    </head>
    <body class="back">
        <h1 class="h1">アドレス帳</h1>
        <h3 style="text-align: center">ログイン</h3>
    <form method="post" action="index.php " >
        <table style="width:400px; margin: 0 auto;">
            <tbody>
                <tr style="text-align:center">
                    <td>
                        <label for="user_name">名前</label>
                    </td>
                    <td>
                        <label for="user_name">:</label>
                    </td>
                    <td style="text-align:left">
                        <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars_decode ($user_name ,ENT_COMPAT); ?>"/><br />
                        <?php if (empty($user_name) && empty($ec)) { ?>
                            <div style ="color:red">名前を入力して下さい！</div>
                        <?php } ?>                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_pass">パスワード</label>
                    </td>
                    <td>
                        <label for="user_pass">:</label>
                    </td>
                    <td style="text-align:left">
                        <input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
                        <?php if (empty($user_pass) && empty($ec)) { ?>
                            <div style ="color:red">パスワードを入力して下さい！</div>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <div style="text-align: center">
                    <input type="submit" value="ログイン" name="submit" />
                    <input type="hidden" value="login" name="action">        
    </div>
</form>
        
    </body>
</html>
        
        
        