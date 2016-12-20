<?php
  session_start();
  include ('config.inc.php');
  $urole = 0;
  $uid = 0;
  $uname = 'ゲスト';
  $urname = 'ゲスト';
  if (isset($_SESSION['urole'])){
    $uid  = $_SESSION['uid'];
    $urole  = $_SESSION['urole'];
    $uname  = $_SESSION['uname'];
    $urname = $_SESSION['urname'];
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="utf-8">
  <title><?=$conf['site_title'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/custom.min.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
  jQuery( function($) {
    $('tbody tr[data-href]').addClass('clickable').click( function() {
      window.location = $(this).attr('data-href');
    }).find('a').hover( function() {
      $(this).parents('tr').unbind('click');
    }, function() {
      $(this).parents('tr').click( function() {
        window.location = $(this).attr('data-href');
      });
    });
  });
</script>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><?=$conf['site_name'] ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="drink.php" id="themes"><?=$urname ?>メニュ<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <?php
                foreach($_pulldown_menu[$urole] as $label => $url){
                  echo '<li><a href="' . $url . '">' . $label . '</a></li>';
                }
                ?>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
            $items = ($urole==0) ? $_guest_menu : $_user_menu;
            if ($urole > 0)
              echo '<li><a href="#">'. $uname . 'さん</a></li>';
            foreach($items as $label => $url)
              echo '<li><a href="' . $url . '">' . $label . '</a></li>';
          ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
<!--
      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>Cyborg</h1>
            <p class="lead">Jet black and electric blue</p>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="list-group table-of-contents">
              <a class="list-group-item" href="#navbar">Navbar</a>
              <a class="list-group-item" href="#buttons">Buttons</a>
              <a class="list-group-item" href="#typography">Typography</a>
              <a class="list-group-item" href="#tables">Tables</a>
              <a class="list-group-item" href="#forms">Forms</a>
              <a class="list-group-item" href="#navs">Navs</a>
              <a class="list-group-item" href="#indicators">Indicators</a>
              <a class="list-group-item" href="#progress-bars">Progress bars</a>
              <a class="list-group-item" href="#containers">Containers</a>
              <a class="list-group-item" href="#dialogs">Dialogs</a>
            </div>
          </div>
        </div>
      </div>
-->