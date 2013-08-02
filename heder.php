<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>Address Book</title>
    </head>
    <body class="back">
        <table>
            <tbody>
                <tr style="text-align: center">
                    <td>
                        <h1 class="h1">アドレス帳</h1>
                    </td>
                    <td class="name">
                        <?php echo $user_name; ?>　のアドレス帳
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tboby>
                <tr>
                    <td class="heder">
                        <a href ="index.php">アドレス一覧</a>
                    </td>
                    <td class="heder">
                        <a href ="view_search.php">検索</a>
                    </td>
                    <td class="heder">
                        <a href ="view_singup_name.php">新規登録</a>
                    </td>
                    <td class="heder">
                        <a href ="view_logout.php">ログアウト</a>
                    </td>
                </tr>
            </tboby>
        </table>
<br /><br />
        

