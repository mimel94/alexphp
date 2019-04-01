<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html class="full-height" lang="en">
<?php include 'base/head.html';?>
<body id="top">
    <header>
        <?php
                include 'base/nav.html';
                include 'base/section.html';
                include  'conexionBD.php';

                $tamagnoPaginas=3;
                $pagina=1;

                /*consulta*/
                $consultaCarros = $base->query("select carro.id as id, carro.nombre as nombre, modelo, marca.nombre as marca, tipo_carro.nombre as tipo, precio, url_foto, descripcion
                from carro inner join marca on carro.marca_id=marca.id
                inner join tipo_carro on carro.tipo_carro_id=tipo_carro.id order by carro.id asc ;");

                /*resultado*/

                $resultadoCarros = $consultaCarros->fetchAll(PDO::FETCH_OBJ);

                /*paginacion no completa
                $numFilas = count($resultadoCarros);

                $totalPaginas = ceil($numFilas/$tamagnoPaginas);
                echo "numero de registos son: ".$numFilas."<br>";
                echo "mostramos ".$tamagnoPaginas." registros por pagina <br>";
                echo "Mostrando la pagina ".$pagina." de ".$totalPaginas."<br>";

                $consultaCarros->closeCursor();
                */

        ?>
    </header>
    <div id="content">

        <section class="text-center py-5 grey lighten-4" id="about">
            <div class="container">
                <div class="wow fadeIn">
                    <h2 class="h1 pt-5 pb-3">¿Por que elegirnos?</h2>
                    <p class="px-5 mb-5 pb-3 lead blue-grey-text">
                        Somos una concesionaria que compite a nivel nacional con los mejores precios del mercado.
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-r wow fadeInUp" data-wow-delay=".3s"><i class="fa fa-dashboard fa-3x orange-text"></i>
                        <h3 class="h4 mt-3">Diseño</h3>
                        <p class="mt-3 blue-grey-text">
                            El diseño automotriz marca la diferencia.
                        </p>
                    </div>
                    <div class="col-md-4 mb-r wow fadeInUp" data-wow-delay=".4s"><i class="fa fa-comments-o fa-3x cyan-text"></i>
                        <h3 class="h4 mt-3">Recomendaciones</h3>
                        <p class="mt-3 blue-grey-text">
                           somos la concesionaria mas recomendada por nuestros fieles clientes.
                        </p>
                    </div>
                    <div class="col-md-4 mb-r wow fadeInUp" data-wow-delay=".5s"><i class="fa fa-cubes fa-3x red-text"></i>
                        <h3 class="h4 mt-3">Ejecución</h3>
                        <p class="mt-3 blue-grey-text">
                            Todos nuestros tramites se ejecutan en tiempo rapido.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center py-5 indigo darken-1 " id="pricing">
            <div class="container">
                <div class="wow fadeIn text-white">
                    <h2 class="h1 pt-5 pb-3">Nuestros Automoviles</h2>
                    <p class="px-5 mb-5 pb-3 lead">
                        Tenemos a su disposición la mejor gama de automoviles.
                    </p>
                </div>
                <!-- Portfolio Gallery Grid -->
                <div class="row wow fadeIn">
                    <?php
                            foreach($resultadoCarros as $carro):?>

                    <div class="column col-lg-4 col-md-12 mb-r">
                        <div class=" wow zoomIn card ">
                            <img src="img/cars/<?php echo $carro->url_foto; ?>" alt="Mountains" style="width:100%">
                            <br/>
                            <h3><?php echo $carro->nombre; ?></h3>
                            <p>Modelo <?php echo $carro->modelo; ?></p>
                            <p><?php echo $carro->marca; ?></p>
                            <p>Tipo <?php echo $carro->tipo; ?></p>
                            <p>$<?php echo $carro->precio; ?></p>
                            <p><?php echo $carro->descripcion; ?></p>
                            <p><a href="comprar.php?id=<?php echo $carro->id.'&'.'carro='.$carro->nombre;?>" class="btn btn-outline-black mt-5"> Comprar</a></p>
                        </div>
                    </div>
                    <?php
                            endforeach;
                    ?>
                </div>

                </div>
            </div>
        </section>
        <section class="py-5" id="team">
            <div class="container">
                <div class="wow fadeIn">
                    <h2 class="h1 pt-5 pb-3 text-center">Nuestro Equipo</h2>
                    <p class="px-5 mb-5 pb-3 lead text-center blue-grey-text">
                        Conformado con los mejores especialista en las areas encargadas para brindar el mejor apoyo.
                    </p>
                </div>
                <div class="row mb-lg-4 center-on-small-only">
                    <div class="col-lg-6 col-md-12 mb-r wow fadeInLeft" data-wow-delay=".3s">
                        <div class="col-md-6 float-left"><img class="img-fluid rounded z-depth-1 mb-3" src="img/woman-1.jpg" alt="team member"/></div>
                        <div class="col-md-6 float-right">
                            <div class="h4">Nicole West</div>
                            <h6 class="font-bold blue-grey-text mb-4">Lead Designer</h6>
                            <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i><span class="ml-1">@nicolewest</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-r wow fadeInRight" data-wow-delay=".3s">
                        <div class="col-md-6 float-left"><img class="img-fluid rounded z-depth-1 mb-3" src="img/woman-2.jpg" alt="team member"/></div>
                        <div class="col-md-6 float-right">
                            <div class="h4">Hannah Cruz</div>
                            <h6 class="font-bold blue-grey-text mb-4">Photographer</h6>
                            <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i><span class="ml-1">@hannahcruz</span></a>
                        </div>
                    </div>
                </div>
                <div class="row center-on-small-only">
                    <div class="col-lg-6 col-md-12 mb-r wow fadeInLeft" data-wow-delay=".3s">
                        <div class="col-md-6 float-left"><img class="img-fluid rounded z-depth-1 mb-3" src="img/man-1.jpg" alt="team member"/></div>
                        <div class="col-md-6 float-right">
                            <div class="h4">Mark Hall</div>
                            <h6 class="font-bold blue-grey-text mb-4">Web Developer</h6>
                            <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i><span class="ml-1">@markhall</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-r wow fadeInRight" data-wow-delay=".3s">
                        <div class="col-md-6 float-left"><img class="img-fluid rounded z-depth-1 mb-3" src="img/man-2.jpg" alt="team member"/></div>
                        <div class="col-md-6 float-right">
                            <div class="h4">Vincent Harris</div>
                            <h6 class="font-bold blue-grey-text mb-4">Web Developer</h6>
                            <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i><span class="ml-1">@vincentharris</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" style="background-image:url('img/panorama-3094696_1920.jpg');">
            <div class="rgba-black-strong py-5">
                <div class="container">
                    <div class="wow fadeIn">
                        <h2 class="h1 text-white pt-5 pb-3 text-center">Contactános</h2>
                        <p class="text-white px-5 mb-5 pb-3 lead text-center">
                            Queremos siempre darte la mejor atencion es por eso que si tienes alguna duda escribenos y nos pondremos
                            de inmediato en contacto con tigo.
                        </p>
                    </div>
                    <div class="card mb-5 wow fadeInUp" data-wow-delay=".4s">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-unstyled text-center">
                                        <li class="mt-4"><i class="fa fa-map-marker indigo-text fa-2x"></i>
                                            <p class="mt-2">Avenida de las Americas 123, torre 2 apto 201, Bogota DC</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled text-center">
                                        <li class="mt-4"><i class="fa fa-phone indigo-text fa-2x"></i>
                                            <p class="mt-2">+ 57 320 311 36 32</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled text-center">
                                        <li class="mt-4"><i class="fa fa-envelope indigo-text fa-2x"></i>
                                            <p class="mt-2">contacto@vendeautosya.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section></div>
    <?php include 'base/footer.html';?>
    <?php include 'base/js.html';?>
</body>
</html>