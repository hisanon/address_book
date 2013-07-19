
<?php require_once 'heder.php'; ?>

<div style="text-align: center">
<h2>ログアウト</h2>
<p>ログアウトしてもよろしいですか？</p>
</div>

<div style="width:200px; margin: 0 auto;">
    <table>
        <tbody>
            <tr>
                <td style="width:100px; text-align: left">
                    <form method="post" action="index.php " >
                        <input type="submit" value="はい" name="submit" />
                        <input type="hidden" value="logout_complete" name="action">
                    </form>                    
                </td>
                <td style="width:100px; text-align: right">
                    <form method="post" action="index.php " >
                        <input type="submit" value="いいえ" name="submit" />
                        <input type="hidden" value="" name="action">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>


</body>
</html>

