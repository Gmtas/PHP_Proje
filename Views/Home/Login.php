
<div class="verticalcenter">
    <form action="../../Controller/LoginController.php" id="LoginForm" method="post">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4 class="text-center" style="margin-bottom: 25px;">Admin Paneli Giriş</h4>

                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input class="form-control" id="UserName" name="UserName" placeholder="User Name" type="text" value="" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input class="form-control" id="Password" name="Password" placeholder="Password" type="password" />
                        </div>
                    </div>
                </div>

                <div class="clearfix">
                    <div class="pull-left">
                        <?php if(isset($_GET['fdb']) && $_GET['fdb']== '1' ){ ?>
                        <label style="color: #b43e2e;"> Kullanıcı adı veya şifre hatalı </label>
                        <?php } ?>
                    </div>
                </div>

                <div class="clearfix">
                    <div class="pull-right">
                        <label style="margin-right:12px;">
                            <input id="RememberMe" name="RememberMe" placeholder="Beni Hatırla" type="checkbox" value="true" /><input name="RememberMe" type="hidden" value="false" /> &nbsp;Beni Hatırla</label>
                    </div>
                </div>


            </div>
            <div class="panel-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-link" style="padding-left:0; padding-top:0;">Şifremi Unuttum</a><br />
                    <a href="#" class="btn btn-link" style="padding-left:0; padding-bottom:0;">Kullanıcı Adımı Unuttum</a>
                </div>

                <div class="pull-right">
                    <input type="submit" value=Login id="btnLogin" class="btn btn-success" />
                </div>
            </div>
        </div>
    </form>
</div>

