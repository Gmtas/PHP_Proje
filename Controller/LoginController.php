<?php

require_once('../Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    header("Location:../hata.php?msg=conDB");
}


$query = $conDB->prepare("SELECT * FROM t_users WHERE username=? && password=?");

$query->execute(array(
                    $_POST['UserName'],
                    $_POST['Password']
                    ));


if ($d=$query->fetchAll(PDO::FETCH_ASSOC)){

    session_start();

    $_SESSION['username'] = $d[0]["username"];
    $_SESSION['group_id'] = $d[0]["group_id"];

    $DB->Close();

    header("Location:../admin-panel");
}
else{
    header("Location:../login-1");
}



