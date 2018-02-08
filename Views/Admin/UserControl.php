<?php

require_once('../../Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    $hata="DBFalse";

}
else{
    $hata="DBTrue";
}

$query = $conDB->prepare("SELECT * FROM t_customers WHERE isim=?");

$query->execute(array(
        $_POST['isim']
    ));

if ($customers=$query->fetchAll(PDO::FETCH_ASSOC)) {
    echo true;
}
else{
    echo false;
}