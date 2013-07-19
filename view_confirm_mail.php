
<?php require_once 'heder.php'; ?>

<h2 style="text-align: center">アドレス登録</h2>
<form mithod="post" action="index.php">
    <div style="width:35%; margin: 0 auto;">
        <p>登録者確認</p>
        <p>　この内容で登録します。</p>
      <table>
        <tbody>
            <tr>
                <td style="text-align: center">登録NO</td><td>:</td><td style="text-align: center">○○</td>
            </tr>
            <tr>
                <td style="width:25%;text-align: center">名前</td><td>:</td><td style="wdth:30%;text-align: center">山田</td><td>/</td><td style="wdth:30%;text-align: center">太郎</td>
            </tr>
            <tr>
                <td style="text-align: center">フリガナ</td><td>:</td><td style ="text-align: center">ヤマダ</td><td>/</td><td style="text-align: center">タロウ</td>
            </tr>
            <tr>
                <td style="text-align: center">グループ</td><td>:</td><td colspan="3">○○</td>
            </tr>
            <tr>
                <td style="text-align: center">メール<br />アドレス</td><td>:</td><td colspan="3">○○○○@○○.com</td>
            </tr>
            <tr>
                <td style="text-align: center">電話番号</td><td>:</td><td colspan="5">○○○○○○○○○○○/○○○○○○○○○○○/○○○○○○○○○○○/○○○○○○○○○○○</td>
            </tr>
        </tbody>
    </table>
   <br />
   <table style="width: 200px; margin: 0 auto;">
       <tbody>
           <tr>
               <td width="150">
                   <input type="submit" value="登録">
               </td>
               <td width="50">
                   <input type="submit" value="戻る">
               </td>
           </tr>
       </tbody>
   </table>
    </div>
    </div>
</form>

</body>
</html>



