<?php
session_start();
if($_SESSION['group_id']!=1 && $_SESSION['group_id']!=2  ) header("Location:../../index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="...">
    <meta name="author" content="...">
    <link rel="icon" href="~/images/logoic.png">
    <title>Yönetici Paneli</title>

    <?php include('../../Render_Styles.html'); ?>
    <?php include('../../Render_Scripts.html'); ?>

</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="" data-original-title="Menü Aç/Kapat"></a>

    <div class="pull-left logo-yani-yazisi">
        Yönetici Paneli
    </div>

    <div class="pull-right logo-yani-yazisi">
         Hoşgeldiniz <?php  echo $_SESSION['username']; ?>
    </div>
</header>

<div id="page-container">

    <nav id="page-leftbar" role="navigation">

        <ul class="acc-menu" id="sidebar">
            <li><a href="#"><i class="fa fa-home"></i><span>Ana Sayfa</span></a></li>
            <li class="divider"></li>
            <li><a href="../Admin/AdminLayout.php?page=Detail"><i class="fa fa-users"></i><span>Müşteriler</span></a></li>

            <?php if($_SESSION['group_id']==1){ ?>
            <li><a href="../Admin/AdminLayout.php?page=Add"><i class="fa fa-plus"></i><span>Yeni Ekle</span></a></li>
            <?php } ?>

            <li><a href="Exit.php"><i class="fa fa-sign-out"></i><span>Çıkış</span></a></li>
        </ul>

    </nav>

    <div id="page-content">
        <div id='wrap'>
            <div class="container">

              <?php
              if(isset($_GET['page'])){
                  include($_GET['page'].'.php');
              }
              ?>

            </div>
        </div>
    </div>

    <footer role="contentinfo">
        <div class="clearfix">
            <ul class="list-unstyled list-inline">
                <li>Proje &copy; 2018</li>
            </ul>
        </div>
    </footer>

</div>



</body>
</html>
