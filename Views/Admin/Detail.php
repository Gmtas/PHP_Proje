<?php

require_once ('../../Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    header("Location:../../hata.php?msg=conDB");
}

$query = $conDB->prepare("SELECT * FROM t_customers");

$query->execute();

?>

<div class="panel panel-gray">
    <div class="panel-heading">
        <div class="col-md-12">
            <h4>Müşteri Detayları</h4>

            <?php if($_SESSION['group_id']==1){ ?>
            <a href="../Admin/AdminLayout.php?page=Add"  class="btn btn-success btn-sm tooltips pull-right" ><i class="fa fa-plus">&nbsp;&nbsp; Yeni Müşteri Ekle</i></a>
            <?php } ?>

        </div>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-3">İSİM</th>
                        <th class="col-md-3">SOYİSİM</th>
                        <th class="col-md-2">TELEFON</th>
                        <th class="col-md-3">ADRES</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    if ($customers=$query->fetchAll(PDO::FETCH_ASSOC)){

                        foreach ($customers as $key => $value)
                        { ?>

                            <tr>

                                <td><?php echo $value['id']   ?></td>
                                <td><?php echo $value['isim']   ?></td>
                                <td><?php echo $value['soyisim']   ?></td>
                                <td><?php echo $value['telefon']   ?></td>
                                <td><?php echo $value['adres']   ?></td>

                                <?php if($_SESSION['group_id']==1){ ?>
                                <td><a href='../Admin/AdminLayout.php?page=Edit&_id=<?php echo $value['id']?>' class='btn btn-xs btn-info tooltips' title='Düzenle'>Düzenle</a></td>
                                <td><a href='../Admin/AdminLayout.php?page=Delete&_id=<?php echo $value['id']?>' class="btn btn-xs btn-danger tooltips"  title="Sil"> Sil</a></td>
                                <?php }?>

                            </tr>

                            <?php
                        }

                    }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php $DB->Close(); ?>
