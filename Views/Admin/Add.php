<?php

if($_SESSION['group_id']!=1) header("Location:exit.php");

?>


<form action="../../Controller/AdminController.php?action=add" id="AddForm" method="post">
    <div class="panel panel-gray">
        <div class="panel-heading">
            <div class="col-md-12">
                <h4>Yeni Müşteri Ekle</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-4">
                        <label><b>İSİM</b> </label>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input class="form-control" id="isim" name="isim" style="width:500px;" type="text" value="" />
                                <p id="warning_text" style="color: red">Bu Kullanıcı Zaten Var!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label><b>SOYİSİM</b> </label>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input class="form-control" id="soyisim" name="soyisim" style="width:500px;" type="text" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label><b>TELEFON</b> </label>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input class="form-control" id="telefon" name="telefon" style="width:500px;" type="text" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <label><b>ADRES</b> </label>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" cols="20" id="adres" name="adres" rows="10" style="width: 500px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="btn-toolbar pull-right">
                        <input type="submit" value="Ekle" class="btn btn-success" id="btnsub" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>


<script>
    $(document).ready(function()
    {
        $('#warning_text').hide();

        $('#isim').blur(function()
        {

            var _data = $("#isim").val();

            $.ajax({
                url: 'UserControl.php',
                type: 'POST',
                data: {isim: _data},
                success: function(msg)
                {
                    if(msg==true){
                        $('#warning_text').show();
                        $('#btnsub').attr('disabled','disabled');
                    }
                    else{
                        $('#warning_text').hide();
                        $('#btnsub').removeAttr('disabled');
                    }
                },
                error: function()
                {
                    //alert("Hata meydana geldi. Lütfen tekrar deneyiniz !!!");
                }

            });

        });

    });

</script>

