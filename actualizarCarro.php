<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'conexionBD.php';

        if(!isset($_POST["actualizar"])){

            $id = $_GET["id"];

            /*consulta*/
            $consultaMarca =$base->query("select id, nombre from marca order by id asc");

            $consultaTipoCarro =$base->query("select id, nombre from tipo_carro order by id asc");

            $consultaCarro =$base->query("select id, nombre, modelo, marca_id as marca, tipo_carro_id as tipo, precio, descripcion from carro
                                        where id='$id'");

            /*resultado*/

            $resultadoCarro = $consultaCarro->fetch(PDO::FETCH_ASSOC);


            $resultadoMarca = $consultaMarca->fetchAll(PDO::FETCH_OBJ);

            $resultadoTipoCarro = $consultaTipoCarro->fetchAll(PDO::FETCH_OBJ);

        }else{

            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $modelo = $_POST["modelo"];
            $marca = $_POST["marca"];
            $tipo = $_POST["tipo"];
            $precio = $_POST["precio"];
            $descripcion = $_POST["descripcion"];

            $sql="update carro set nombre=:nombre, modelo=:modelo, marca_id=:marca, tipo_carro_id=:tipo,
                    precio=:precio, descripcion=:descripcion where id=:id";

            $resultado = $base->prepare($sql);

            $resultado->execute(array(":id"=>$id, ":nombre"=>$nombre, ":modelo"=>$modelo, ":marca"=>$marca,
                                      ":tipo"=>$tipo, ":precio"=>$precio, ":descripcion"=>$descripcion));

            header("location:listarCarros.php");

        }
        ?>
<body>
<header>
    <?php include 'base/nav.html';?>
</header>
<section id="contact" style="background-image:url('img/panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Ingresar Nuevo Vehiculo</h2>

            </div>
            <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-12   ">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input id="id" value="<?php echo $resultadoCarro['id']?>" type="hidden" name="id"/>
                                            <input class="form-control" id="nombre" value="<?php echo $resultadoCarro['nombre']?>" type="text" name="nombre" required="required"/>
                                            <label for="name">Nombre del carro</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="modelo"  value="<?php echo $resultadoCarro['modelo']?>" type="text" name="modelo" required="required"/>
                                            <label for="modelo">Modelo</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 input-field">
                                        <label for="marca">Marca</label>
                                        <select class="form-control" name="marca">
                                            <?php
                                                    foreach($resultadoMarca as $resultado){
                                                    if($resultadoCarro['marca'] == $resultado->id){
                                                        echo "<option value='".$resultado->id."' selected='selected'>".$resultado->nombre."</option>";
                                                    }else{
                                                        echo "<option value='".$resultado->id."'>".$resultado->nombre."</option>";
                                                    }

                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 input-field">
                                        <label for="tipo">Tipo</label>
                                        <select class="form-control" name="tipo" >
                                            <?php

                                                    foreach($resultadoTipoCarro as $resultado){
                                                    if($resultadoCarro['tipo'] == $resultado->id){
                                                    echo "<option value='".$resultado->id."' selected='selected'>".$resultado->nombre."</option>";
                                                    }else{
                                                    echo "<option value='".$resultado->id."'>".$resultado->nombre."</option>";
                                                    }

                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="precio"  value="<?php echo $resultadoCarro['precio']?>" type="text" name="precio" required="required"/>
                                            <label for="precio">Precio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <textarea class="md-textarea" id="descripcion" value="" name="descripcion" required="required"> <?php echo $resultadoCarro['descripcion']?></textarea>
                                            <label for="descripcion">Descripción</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="center-on-small-only mb-4">
                                        <button name="actualizar" class="btn btn-indigo ml-0" type="submit"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Actualizar</button>
                                    </div>
                                    </form>
                                    <div class="center-on-small-only mb-4">
                                        <a class="btn btn-indigo ml-0"href="listarCarros.php"> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> Volver</a>
                                    </div>
                                </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'base/js.html';?>
</body>
</html>