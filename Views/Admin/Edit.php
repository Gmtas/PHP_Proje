<?php

if($_SESSION['group_id']!=1) header("Location:exit.php");

require_once ('../../Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    header("Location:../../hata.php?msg=conDB");
}


$query = $conDB->prepare("SELECT * FROM t_customers WHERE id=?");

$query->execute(array($_GET['_id']));

$result=$query->fetchAll(PDO::FETCH_ASSOC);

?>

<form action="../../Controller/AdminController.php?action=edit" id="editForm" method="post">
    <div class="panel panel-gray">
        <div class="panel-heading">
            <div class="col-md-12">
                <h4>Yeni Müşteri Ekle</h4>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                    <label><b>İSİM</b> </label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" id="isim" name="isim" style="width:500px;" type="text" value="<?php echo $result[0]["isim"]; ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label><b>SOYİSİM</b> </label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" id="soyisim" name="soyisim" style="width:500px;" type="text" value="<?php echo $result[0]["soyisim"]; ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label><b>TELEFON</b> </label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" id="telefon" name="telefon" style="width:500px;" type="text" value="<?php echo $result[0]["telefon"]; ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label><b>Şehir</b> </label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" id="city_id" name="city_id" style="width:500px;">
                                <option value="1">Lefkoşa</option>
                                <option value="2">Girne</option>
                                <option value="3">Lefke</option>
                                <option value="4">GüzelYurt</option>
                                <option value="5">Mağusa</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label><b>ADRES</b> </label>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" id="adres" name="adres" rows="5" style="width: 500px" ><?php echo $result[0]["adres"]; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $result[0]["id"]; ?>" />

        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="btn-toolbar pull-right">
                        <input type="submit" value="Kaydet" class="btn btn-success" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

<?php $DB->Close(); ?>
