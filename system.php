<?php

error_reporting(0);
    require_once("config.php");
    if(isset($_POST['buy'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['update_quantity'];

        $insert = $db->prepare("INSERT INTO `shop` (name, price, quantity) VALUES(?,?,?)");
        $insert->execute([$name,$price,$quantity]);
    }

    if(isset($_POST['delete_all'])){
        $delete_all = $db->prepare("DELETE  FROM `shop` ");
        $delete_all->execute();
        header('refresh:1;');
    }

?>