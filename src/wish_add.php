<?php include('page_header.php'); ?>

<h2>進路希望登録</h2>

<form action="wish_save.php" method="post">
<table>
<tr><td>希望進路</td><td>
  <input type="radio" name="careertype" value="1" />就職
  <input type="radio" name="careertype" value="2" />進学
  <input type="radio" name="careertype" value="3" />その他
</td></tr>
<tr><td>進路詳細</td><td>
  <textarea name="detail" rows="5" cols="40"></textarea>
</td></tr>
</table>

 <input type="submit" name="a" value="送信"/>
<input type="reset" value="取消"/>
</form>
<?php include('page_footer.php'); ?>