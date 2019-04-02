<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'conexionBD.php';

        /*consulta*/
        $consultaMarca =$base->query("select id, nombre from marca order by id asc");

        $consultaTipoCarro =$base->query("select id, nombre from tipo_carro order by id asc");

        /*resultado*/

        $resultadoMarca = $consultaMarca->fetchAll(PDO::FETCH_OBJ);

        $resultadoTipoCarro = $consultaTipoCarro->fetchAll(PDO::FETCH_OBJ);


        if(isset($_POST["crear"])){

            $nombre = $_POST["nombre"];
            $modelo = $_POST["modelo"];
            $marca = $_POST["marca"];
            $tipo = $_POST["tipo"];
            $precio = $_POST["precio"];

            $nombreImagen = $_FILES['foto']['name'];
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/alexphp/img/cars/';

            //movemos la imagen a la carpeta destino.
            move_uploaded_file($_FILES['foto']['tmp_name'], $carpetaDestino.$nombreImagen);
            $urlFoto = $nombreImagen;




        $descripcion = $_POST["descripcion"];

            $sql = "insert into carro (nombre, modelo, marca_id, tipo_carro_id, precio, url_foto, descripcion)
                    values (:nombre, :modelo, :marca, :tipo, :precio, :url, :descripcion)";

            $resultado = $base->prepare($sql);

            $resultado->execute(array(":nombre"=>$nombre, ":modelo"=>$modelo, ":marca"=>$marca, ":tipo"=>$tipo,
                                        ":precio"=>$precio, ":url"=>$urlFoto, ":descripcion"=>$descripcion));

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
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="nombre" type="text" name="nombre" required="required"/>
                                            <label for="name">Nombre del carro</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="modelo"   type="text" name="modelo" required="required"/>
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
                                            <input class="form-control" id="precio"  type="text" name="precio" required="required"/>
                                            <label for="precio">Precio</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input class="form-control" id="foto"  type="file" accept="image/*" size="20" name="foto" />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <textarea class="md-textarea" id="descripcion" name="descripcion" required="required"> </textarea>
                                            <label for="descripcion">Descripción</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="center-on-small-only mb-4">
                                    <button name="crear" class="btn btn-indigo ml-0" type="submit"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> Crear</button>
                                </div>
                            </form>
                            <div class="center-on-small-only mb-4">
                                <a class="btn btn-indigo ml-0"href="listarCarros.php"> <i class="fa fa-circle-o-notch" aria-hidden="true"></i> Listar carros</a>
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