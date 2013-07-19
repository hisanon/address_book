
<?php require_once 'heder.php'; ?>

<div style="width:400px; margin: 0 auto;">
<h2>アドレス検索</h2>
<form method ="post" action ="index.php">
    <input  size="30" type="text" id="search_name" name="search_name" value="">
    <select id="search_item" name="search_item">
        <option value="1"selected >登録NO</option>
        <option value="2"selected >名字(漢字)</option>
        <option value="3"selected >名字(フリガナ)</option>
        <option value="4"selected >名前(漢字)</option>
        <option value="5"selected >名前(フリガナ)</option>        
    </select>
    <input type="submit" value="検索">
</form>

</div>

<br /><br />
<?php
//表示
require_once 'view_address.php';
?>


</body>
</html>
