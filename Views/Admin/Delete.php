<?php

if($_SESSION['group_id']!=1) header("Location:Exit.php");

?>

<form action="../../Controller/AdminController.php?action=delete" id="AddForm" method="post">
    <div class="panel panel-gray">
        <div class="panel-heading">
            <div class="col-md-12">
                <h4>Müşteri Sil</h4>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12">
                        <label><b><?php echo $_GET['_id']; ?> ID Numaralı Müşteriyi Silmek Üzeresiniz. Onaylıyor musunuz?</b> </label>
                </div>
            </div>

        </div>

        <input type="hidden" name="id" value="<?php echo $_GET['_id']; ?>" />

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="btn-toolbar pull-right">
                        <input type="submit" value="Onay" class="btn btn-success" />
                        <input type="" value="Vazgeç" class="btn btn-success" onclick="window.location.href='AdminLayout.php?page=Detail'" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>


