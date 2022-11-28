<?php 
    require "../functions.php";
    if (isset($_GET["id"])){
        $id = $_GET["id"];


        $sql = "DELETE FROM makanan WHERE id=$id";
        $conn->query($sql);
    }

    header("location:../../app/food.php");
    exit;
?>