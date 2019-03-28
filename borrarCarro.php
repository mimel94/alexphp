<?php

        include  'conexionBD.php';


        $id = $_GET['id'];

        $base->query("delete from carro where id='$id'");
        header("location:listarCarros.php");


?>