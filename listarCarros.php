<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<?php
        include 'base/head.html';
        include  'coneccionBD.php';
        $coneccion = mysqli_connect($host, $user, $pw, $bd) or die ("problemas al conectar el host");
        mysqli_select_db($coneccion, $bd) or die ("error al conectar con la base de datos");
        /*consulta*/
        $consultaMarca = "select id, nombre from marca order by id asc";
        $consultaTipoCarro = "select id, nombre from tipo_carro order by id asc";
        /*resultado*/
        $resultadoMarca = mysqli_query($coneccion, $consultaMarca);
        $resultadoTipoCarro = mysqli_query($coneccion, $consultaTipoCarro);
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
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Prado</td>
                                <td>2012</td>
                                <td>Toyota</td>
                                <td>Todo terreno</td>
                                <td>500.000.000</td>
                                <td>para todo terreno</td>
                                <td>X</td>
                                <td><a href=""><img src="img/editar.png" style="width:20px" alt="editar"/></a></td>
                            </tr>
                            <tr>
                                <td>Prado</td>
                                <td>2012</td>
                                <td>Toyota</td>
                                <td>Todo terreno</td>
                                <td>500.000.000</td>
                                <td>para todo terreno</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Prado</td>
                                <td>2012</td>
                                <td>Toyota</td>
                                <td>Todo terreno</td>
                                <td>500.000.000</td>
                                <td>para todo terreno</td>
                                <td>X</td>
                            </tr>


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