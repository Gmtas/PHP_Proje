<?php

require_once('../Model/Database.php');

$DB = new Database;

$conDB = $DB->Connect();

if($conDB == "DBFalse")
{
    header("Location:../hata.php?msg=conDB");
}

switch ($_GET['action'])
{
    case 'add':
        addAction($conDB);
        break;
    case 'delete':
        deleteAction($conDB);
        break;
    case 'edit':
        editAction($conDB);
        break;
    default:
        break;
}

$DB->Close();
header('Location: ../admin-detail');

function addAction(&$conDB)
{
    $query = $conDB->prepare("INSERT INTO t_customers SET isim=? , soyisim=? , telefon=? , adres=? , city_id=? ");

    $result = $query->execute(array(
            $_POST['isim'] ,
            $_POST['soyisim'] ,
            $_POST['telefon'] ,
            $_POST['adres'] ,
            $_POST['city_id']
        )
    );

    if($result){
        return;
    }
}

function deleteAction(&$conDB)
{
    $query = $conDB->prepare("DELETE FROM t_customers WHERE id=?");

    $result = $query->execute(array(
            $_POST['id']
        )
    );

    if($result){
        return;
    }
}

function editAction(&$conDB)
{
    $query = $conDB->prepare("UPDATE t_customers SET isim=? , soyisim=? , telefon=? , adres=? , city_id=? WHERE id=? ");

    $result = $query->execute(array(
            $_POST['isim'] ,
            $_POST['soyisim'] ,
            $_POST['telefon'] ,
            $_POST['adres'] ,
            $_POST['city_id'],
            $_POST['id']
        )
    );

    if($result){
        return;
    }
}

