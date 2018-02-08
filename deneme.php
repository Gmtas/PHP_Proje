<?php

require_once('Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    header("Location:../hata.php?msg=conDB");
}


$query = $conDB->prepare("SELECT * FROM t_customers");

$query->execute();

/*
$query = $conDB->prepare("SELECT * FROM t_customers WHERE id=?");

$query->execute(array(1));
*/
$customers=$query->fetchAll(PDO::FETCH_OBJ);

echo var_dump($customers);

if($customers){
    echo "kayıt var";
}
else
    echo "kayıt yok";

if ($customers=$query->fetchAll(PDO::FETCH_OBJ)) {



    foreach ($customers as $key => $value){


    }
}