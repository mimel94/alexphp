<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'conexionBD.php';

        /*consulta*/
        $consultaCarros = $base->query("select formulario_compra.nombre as nombre, correo, telefono, ciudad, carro.nombre as carro
                                        from formulario_compra inner join carro on formulario_compra.carro_id=carro.id order by carro.id asc;");

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
                <h2 class="h1 text-white pt-5 pb-3 text-center">Listado de clientes</h2>

            </div>
            <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="card-body p-5">
                    <div class="row ">
                        <table class="col-md-12 table-responsive-md table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Ciudad</th>
                                <th>Carro</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                                    foreach($resultadoCarros as $carro):?>
                            <tr>
                                <td> <?php echo $carro->nombre; ?> </td>
                                <td><?php echo $carro->telefono; ?></td>
                                <td><?php echo $carro->correo; ?></td>
                                <td><?php echo $carro->ciudad; ?></td>
                                <td><?php echo $carro->carro; ?></td>

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