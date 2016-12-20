<?php include('page_header.php'); ?>
<form class="form-horizontal" action="check.php" method="post">
<div class="form-group center-block">
  <div class="col-sm-offset-2 col-sm-8">
  <input type="text" class="form-control" name="uid" placeholder="ユーザＩＤ">
  </div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-8">
  <input type="password" class="form-control" name="pass" placeholder="パスワード">
</div>
</div>
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-8">
    <button type="submit" class="btn btn-primary btn-block">ログイン</button>
  </div>
</div>
</form>
<?php include('page_footer.php'); ?>