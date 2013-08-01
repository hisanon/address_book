
<?php require_once 'heder.php'; ?>

<div style="width:400px; margin: 0 auto;">
<h2>アドレス検索</h2>
<form method ="post" action ="index.php">
    <input  size="30" type="text" id="search_word" name="search_word" value="<?php $search_word; ?> ">
    <select id="search_item" name="search_item">
        <option value="1"selected >登録NO</option>
        <option value="2" >名字(漢字)</option>
        <option value="3" >名字(フリガナ)</option>
        <option value="4" >名前(漢字)</option>
        <option value="5" >名前(フリガナ)</option>        
    </select>
    <input type="hidden" name="action" value="search">
    <input type="submit" value="検索">
</form>

</div>

<br /><br />
<?php
if(empty($search_item)){
    require_once 'model.php';
    $sth= NAMEDATA($db,$st,$lim);
}
//表示
require_once 'view_address.php';
?>

</body>
</html>
