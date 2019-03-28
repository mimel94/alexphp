<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'conexionBD.php';

        /*consulta*/
        $consultaCarros = $base->query("select carro.id as id, carro.nombre as nombre, modelo, marca.nombre as marca, tipo_carro.nombre as tipo, precio, descripcion
                                        from carro inner join marca on carro.marca_id=marca.id
                                        inner join tipo_carro on carro.tipo_carro_id=tipo_carro.id order by carro.id asc;");

        /*resultado*/
        $resultadoCarros = $consultaCarros->fetchAll(PDO::FETCH_OBJ);

        ?>
<body>
<header>
    <?php include 'base/nav.html';?>
</header>
<section id="contact" style="background-image:url('img/panorama-3094696_1920.jpg');">
    <div class="rgba-black-strong py-5">
        <div class="container">
            <div class="wow fadeIn">
                <h2 class="h1 text-white pt-5 pb-3 text-center">Listado de vehiculos disponibles</h2>

            </div>
            <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row ">
                        <table class="col-md-12 table-responsive-md table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Foto</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                                    foreach($resultadoCarros as $carro):?>
                            <tr>
                                <td> <?php echo $carro->nombre; ?> </td>
                                <td><?php echo $carro->modelo; ?></td>
                                <td><?php echo $carro->marca; ?></td>
                                <td><?php echo $carro->tipo; ?></td>
                                <td><?php echo $carro->precio; ?></td>
                                <td><?php echo $carro->descripcion; ?></td>
                                <td>X</td>
                                <td><a href="actualizarCarro.php?id=<?php echo $carro->id?>;"><img src="img/editar.png" style="width:20px" alt="editar"/></a></td>
                                <th><a href="borrarCarro.php?id=<?php echo $carro->id?>;"><img src="img/delete.png" style="width:20px" alt="editar"/></a></th>
                            </tr>
                            <?php
                                endforeach;
                            ?>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'base/js.html';?>
</body>
</html>